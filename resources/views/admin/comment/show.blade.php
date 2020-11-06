@extends('layouts.app')

@section('title', '投稿の詳細画面')

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
    <a class="nav-link" href="{{ url('/Calculate/building_intake') }}">
        目標摂取カロリー計算
    </a>
</li>
@endsection

{{-- ここからコンテンツ --}}
@section('content')
<div class="container">
    <div class="row">
        <h2 class="h4 mt-2 ml-2">投稿記事の詳細</h2>
    </div>

    {{-- 投稿本体 --}}
    <div class="row">
        <div class="col-md-10 mr-auto">
            <a href="{{ action('Admin\ArticleController@index') }}">← 投稿一覧に戻る</a>
            <div class="card">
                <div class="card-header bg-dark text-white">
                    @isset($article->user_image_path)
                    <img class="float-left prof-image" src="{{ $article->user_image_path }}">
                    @else
                    <img class="float-left prof-image" src="{{ '/images/defaulte_user.jpg' }}">
                    @endisset
                    <span class="float-left pl-2 pt-3">
                        {{ $article->user_name }}
                    </span>
                    <span class="float-right pt-3">
                        {{ $article->created_at->format('Y年m月d日 H:i') }}
                    </span>
                </div>
                <div class="card-body pt-1 pb-1">
                    <div class="card-text pt-1 pb-1">
                        {!! nl2br(e($article->body)) !!}
                    </div>
                    <div class="card-image">
                        @isset($article->image_path)
                        <img class="d-block mx-auto" src="{{ $article->image_path }}">
                        @endisset
                    </div>
                    @if( $article->edited_at != null)
                    <div class="float-right">
                        <br>
                        [{{ $article->edited_at->format('Y年m月d日 H:i') }}編集]
                    </div>
                    @endif
                </div>

                <div class="card-footer bg-white py-1">
                    <span class="badge badge-secondary">
                        コメント {{ $article->comments->count() }}件
                    </span>

                    {{-- ログインユーザーと一致する場合または管理ユーザーの場合は編集削除可能 --}}
                    @if ($article->user_id == Auth::user()->id || Auth::user()->id == 1)
                    <div class="card-link float-right">
                        <a href="{{ action('Admin\ArticleController@edit', ['id' => $article->id]) }}">編集する</a>
                        <a href="{{ action('Admin\ArticleController@delete', ['id' => $article->id]) }}">削除する</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- 投稿に対するコメント一覧 --}}
    <div class="row">
        <div class="col-md-12 ml-4">
            <a class="btn btn-primary mt-4 mb-4 js-modal-open" href="" data-target="modal02">＋コメントする</a>
            @if($article->comments->count() == 0)
            <h5 class="mb-4">まだコメントはありません。</h5>
            @else
            <h5 class="mb-2">コメント一覧(新しい順)</h5>
            @endif

            {{-- コメントのカードをforeachで表示する --}}
            @foreach ($article->comments as $comment)
            <div class="card comment-list mb-2">
                <div class="card-header bg-secondary text-white py-2">
                    @isset($comment->user_image_path)
                    <img class="float-left prof-image" src="{{ $comment->user_image_path }}">
                    @else
                    <img class="float-left prof-image" src="{{ '/images/defaulte_user.jpg' }}">
                    @endisset
                    <span class="float-left pl-2 pt-3">
                        {{ $comment->user_name }}
                    </span>
                    <span class="float-right pt-3">
                        {{ $comment->created_at->format('Y年m月d日 H:i') }}
                    </span>
                </div>
                <div class="card-body py-2">
                    <div class="card-text">
                        {!! nl2br(e($comment->body)) !!}
                    </div>
                </div>
                {{-- ログインユーザーと一致する場合または管理ユーザーの場合は編集削除可能 --}}
                @if ($comment->user_id == Auth::user()->id || Auth::user()->id == 1)
                <div class="card-footer bg-white py-1">
                    <div class="card-link float-right">
                        <a href="{{ action('Admin\CommentController@edit', ['id' => $comment->id]) }}">編集する</a>
                        <a href="{{ action('Admin\CommentController@delete', ['id' => $comment->id]) }}">削除する</a>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>


{{-- 新規コメント投稿のモーダルウィンドウ --}}
<div id="modal02" class="c-modal js-modal">
    <!-- 背景 -->
    <div class="c-modal_bg js-modal-close">
    </div>
    <!-- 本体 -->
    <div class="c-modal_content">
        <div class="c-modal_content_inner">
            <h4>コメントを新規作成</h4>
            <form action="{{ action('Admin\CommentController@create') }}" method="post" enctype="multipart/form-data"
                id="post-form">
                <!-- バリデーションメッセージを表示 -->
                @error('body')
                <tr>
                    <td>{{$message}}</td>
                </tr>
                @enderror
                <!-- コメント本文 -->
                <div class="form-group row">
                    <div class="col-md-10">
                        <textarea id="countUp" name="body" cols="80" rows="6">{{ old('body') }}</textarea>
                        <label class="badge badge-secondary px-3 py-1 float-right">
                            <span id="count1">0</span>
                            <span> / 120</span>
                        </label>
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="hidden" value="{{ $article->id }}" name="articleId">
                <input type="submit" class="btn btn-primary" value="コメントを投稿">
            </form>
            <a class="js-modal-close c-modal_close" href=""><span>閉じる</span></a>
        </div>
    </div>
</div>
@endsection