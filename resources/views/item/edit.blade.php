@extends('adminlte::page')

@section('title', '日用品編集')

@section('content_header')
    <h1>日用品編集</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form action="{{ url('/items/update/'.$item->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">日用品名</label>
                            <input type="text" class="form-control" placeholder="商品名" name="name" value="{{old('name',$item->name)}}">
                        </div>

                            <div class="form-group">
                            <label for="prefecture">カテゴリ</label>
                            <select id="type" class="form-control" name="type" placeholder="カテゴリ" type="text" >
                            <option value="1" @if(old('type',$item->type)== 1) selected @endif>1.キッチン</option>
                            <option value="2" @if(old('type',$item->type)== 2) selected @endif>2.お風呂・トイレ</option>
                            <option value="3" @if(old('type',$item->type)== 3) selected @endif>3.化粧品</option>
                            <option value="4" @if(old('type',$item->type)== 4) selected @endif>4.医薬品</option>
                            <option value="5" @if(old('type',$item->type)== 5) selected @endif>5.その他</option>
                        </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="price">価格/円</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="金額" value="{{old('price',$item->price)}}">
                        </div>

                        <div class="form-group">
                            <label for="stock">在庫/個</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="在庫" value="{{old('stock',$item->stock)}}">
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明" value="{{old('detail',$item->detail)}}">
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">編集</button>
                        <a class="btn btn-danger" href="/items/destroy/{{ $item->id }}" onclick="return confirm('本当に削除しますか？')">削除</a>
                    </div>
                </form>



                <a class="nav-link" href="{{ url('items/')}}" style="color:blue">戻る</a>
            </div>
        </div>
    </div>

@stop

@section('css')
@stop

@section('js')
@stop
