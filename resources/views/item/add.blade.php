@extends('adminlte::page')

@section('title', '日用品登録')

@section('content_header')
    <h1>日用品登録</h1>
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
                            <label for="name">日用品名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="商品名">
                        </div>

                        <!-- ＜カテゴリを選択＞ -->
                        <div class="form-group">
                            <label for="prefecture">カテゴリ</label>
                            <select id="type" class="form-control" name="type" placeholder="カテゴリ">
                            <option value="">（選択してください）</option>
                            <option value="1">1.キッチン</option>
                            <option value="2">2.お風呂・トイレ</option>
                            <option value="3">3.化粧品</option>
                            <option value="4">4.医薬品</option>
                            <option value="5">5.その他</option>
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="price">価格/円</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="金額">
                        </div>

                        <div class="form-group">
                            <label for="stock">在庫/個</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="在庫">
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
