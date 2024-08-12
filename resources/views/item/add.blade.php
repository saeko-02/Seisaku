@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
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
                <form action="{{ url('items/add') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>

                        <div class="form-group">
                            <label for="prefecture">種別</label>
                            <select id="type" class="form-control" name="type" placeholder="種別">
                            <option value="">（選択してください）</option>
                            <option value="漫画">漫画</option>
                            <option value="小説">小説</option>
                            <option value="雑誌">雑誌</option>
                            <option value="絵本">絵本</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
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
