@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
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
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" placeholder="名前" name="name" value="{{old('name',$item->name)}}">
                        </div>

                            <div class="form-group">
                            <label for="prefecture">種別</label>
                            <select id="type" class="form-control" name="type" placeholder="種別" type="text" >
                            <option value="漫画" @if(old('type',$item->type)=="漫画") selected @endif>漫画</option>
                            <option value="小説" @if(old('type',$item->type)=="小説") selected @endif>小説</option>
                            <option value="雑誌" @if(old('type',$item->type)=="雑誌") selected @endif>雑誌</option>
                            <option value="絵本" @if(old('type',$item->type)=="絵本") selected @endif>絵本</option>
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
