<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 日用品一覧
     */
    public function index()
    {
        // 日用品一覧取得
        $items = Item::all();

        // ページネーションを使用
        $items = Item::paginate(10);


        return view('item.index', compact('items'));
    }

    /**
     * 日用品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション

            // 日用品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'price' => $request->price,
                'stock' => $request->stock,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    // 編集画面
    public function edit($id)
    {
        $item = Item::where('id','=',$id)->first();
        return view('item.edit')->with([
            'item'=>$item
        ]);

    }

    public function update(Request $request,$id)
    {
        // dd($request);

        $item = Item::find($id);

            if (!$item) {
    return redirect('items/')->withErrors(['error' => '指定された項目が見つかりませんでした。']);
}

        $validatedData=$request->validate([
            'name' => 'required|max:100',
            'type' => 'required',
            'detail' => 'nullable|max:255',

        ]);

        $item->update($validatedData);
        // $item->name = $request->name;
        // $item->type = $request->type;

        $item->save();

        return redirect('items/')->with('success','項目が正常に更新されました。');
    }

        }

}
