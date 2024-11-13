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
                            <option value="キッチン" @if(old('type',$item->type)=="キッチン") selected @endif>キッチン</option>
                            <option value="お風呂・トイレ" @if(old('type',$item->type)=="お風呂・トイレ") selected @endif>お風呂・トイレ</option>
                            <option value="化粧品" @if(old('type',$item->type)=="化粧品") selected @endif>化粧品</option>
                            <option value="医薬品" @if(old('type',$item->type)=="医薬品") selected @endif>医薬品</option>
                            <option value="その他" @if(old('type',$item->type)=="その他") selected @endif>その他</option>
                        </select>
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
