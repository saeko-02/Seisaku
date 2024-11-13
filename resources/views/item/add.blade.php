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
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="名前">

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
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
