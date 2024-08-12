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
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'type' => 'required',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('items/');
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

    public function destroy($id)
    {
        $item = Item::find($id);

        $item->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect('/items')->with('success', 'アイテムが削除されました');

    
            }



        
}
