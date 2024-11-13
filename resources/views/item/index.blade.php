@extends('adminlte::page')

@section('title', '日用品一覧')

@section('content_header')
    <h1>日用品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>商品名</th>
                                <th>カテゴリ</th>
                                <th>価格/円</th>
                                <th>在庫/個</th>
                                <th>詳細</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>@switch($item->type)
                                @case(1)
                                    キッチン
                                    @break
                                @case(2)
                                    お風呂・トイレ
                                    @break
                                @case(3)
                                    化粧品
                                    @break
                                @case(4)
                                    医薬品
                                    @break
                                @case(5)
                                    その他
                                    @break
                                @default
                                    未分類
                            @endswitch</td>
                                    <td>{{ $item->price }}円</td>
                                    <td>{{ $item->stock }}個</td>
                                    <td>{{ $item->detail }}</td>
                                    <td><a href="{{ url('items/edit/'.$item->id ) }}" class="btn btn-default">編集</a></td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- ページネーションのリンク -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
