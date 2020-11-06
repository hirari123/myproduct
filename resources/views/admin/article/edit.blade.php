@extends('layouts.app')

@section('title', '投稿の編集')

{{-- ナビゲーションバー --}}
@section('navbar-left')
<li>
    <a class="nav-link" href="{{ url('/admin/articles') }}">
        みんなの投稿一覧
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/admin/users') }}">
        みんなのプロフィール一覧
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/calculate/building_intake') }}">
        目標摂取カロリー計算
    </a>
</li>
@endsection

{{-- ここからコンテンツ --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-4 mb-4">
            <h4>投稿の編集画面</h4>
            <br>
            {{-- 投稿のバリデーションメッセージを表示する --}}
            @if (count($errors) > 0)
            <p class="row ml-4">投稿に失敗しました..</p>
            @endif

            @error('body')
            <ul class="row ml-2 text-danger">
                @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
                @endforeach
            </ul>
            @enderror

            @error('image_file')
            <ul class="row ml-2 text-danger">
                @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
                @endforeach
            </ul>
            @enderror

            {{-- 投稿の編集フォーム --}}
            <form action="{{ action('Admin\ArticleController@update') }}" method="post" enctype="multipart/form-data">
                {{-- 投稿本文の項目 --}}
                <div class="form-group row">
                    <label class="col-md-2" for="body">投稿内容</label>
                    <div class="col-md-10">
                        <textarea id="countUp" class="form-control" name="body" cols="50"
                            rows="6">{{ $article_form->body }}</textarea>
                        <label class="badge badge-secondary px-3 py-1 my-2 float-right">
                            <span id="count1">0</span>
                            <span> / 120</span>
                        </label>
                    </div>
                </div>

                {{-- 投稿画像の項目 --}}
                <div class="form-group row">
                    <label class="col-md-2" for="image_file">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image_file">
                        <div class="form-text text-info">
                            設定中の画像ファイル： {{ $article_form->image_path }}
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除する
                            </label>
                        </div>
                    </div>
                </div>

                {{-- 更新ボタン --}}
                <div class="form-group row">
                    <div class="col-md-10">
                        <input type="hidden" name="id" value="{{ $article_form->id }}">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="更新">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection