@extends('adminlte::page')

@section('title', '日用品一覧')

@section('content_header')
    <h1>日用品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- 検索機能 -->
        <form action="{{ url('items/search') }}" method="GET">
                @csrf
                <div class="form-group">
                    <div class="form-row align-items-center d-flex">
                        <div class="col-auto">
                    <!-- キーワード検索フィールド -->
                    <div id="keyword_search" style="width: 300px;">
                        <input placeholder="キーワードを入力" type="text" name="keyword" class="form-control" value="{{ request('keyword') }}">
                    </div>
                        </div>

                        <div class="col-auto">
                            <input type="submit" value="検索" class="btn btn-primary">
                        </div>

                        <div class="col-auto ml-auto">
                            <button type="button" id="clearSearchButton" class="btn btn-outline-secondary ml-1">クリア</button>
                        </div>
                    </div>
                </div>
            </form>
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
                            @forelse ($items as $item)
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
                                @empty
                                <tr>
                                    <td colspan="6">該当する商品がありません</td>
                                </tr>
                            @endforelse
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
<script>
        // ページが完全に読み込まれた後に実行
        document.addEventListener('DOMContentLoaded', function() {
        // クリアボタン
        const clearButton = document.getElementById('clearSearchButton');

            // クリアボタンが押されたときの動作
            clearButton.addEventListener('click', function() {
                // フォームのリセット
                document.querySelector('form').reset();

                // 初期一覧ページにリダイレクト
                window.location.href = "{{ url('/items/searchReset') }}";
            });
        });
</script>
@stop
