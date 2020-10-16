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
                    <img class="float-left prof-image" src="{{ '/storage/user_image/' . $post->user_image_path }}">
                    <span class="float-left pl-2 pt-3">
                        {{ $post->user_name }} (id：{{ $post->user_id }})
                    </span>
                    <span class="float-right pt-3">
                        {{ $post->created_at->format('Y年m月d日 H:i') }}
                    </span>
                </div>
                <div class="card-body pt-1 pb-1">
                    <div class="card-text pt-1 pb-1">
                        {!! nl2br(e($post->body)) !!}
                    </div>
                    <div class="card-image">
                        @isset($post->image_path)
                        <img class="d-block mx-auto" src="{{ '/storage/image/' . $post->image_path }}">
                        @endisset
                    </div>
                    @if( $post->edited_at != null)
                    <div class="float-right">
                        <br>
                        [{{ $post->edited_at->format('Y年m月d日 H:i') }}編集]
                    </div>
                    @endif
                </div>

                <div class="card-footer bg-white py-1">
                    <span class="badge badge-secondary">
                        コメント {{ $post->comments->count() }}件
                    </span>

                    {{-- ログインユーザーと一致する場合または管理ユーザーの場合は編集削除可能 --}}
                    @if ($post->user_id == auth::user()->id || auth::user()->id == 1)
                    <div class="card-link float-right">
                        <a href="{{ action('Admin\ArticleController@edit', ['id' => $post->id]) }}">編集する</a>
                        <a href="{{ action('Admin\ArticleController@delete', ['id' => $post->id]) }}">削除する</a>
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
            @if($post->comments->count() == 0)
            <h5 class="mb-4">まだコメントはありません。</h5>
            @else
            <h5 class="mb-2">コメント一覧(新しい順)</h5>
            @endif

            {{-- コメントのカードをforeachで表示する --}}
            @foreach ($post->comments as $comment)
            <div class="card comment-list">
                <div class="card-header bg-secondary text-white py-2">
                    <img class="float-left prof-image" src="{{ '/storage/user_image/' . $comment->user_image_path }}">
                    <span class="float-left pl-2 pt-3">
                        {{ $comment->user_name }} (id：{{ $comment->user_id }})
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
                <div class="card-footer bg-white py-1">
                    <div class="card-link float-right">
                        <a href="{{ action('Admin\CommentController@edit', ['id' => $comment->id]) }}">編集する</a>
                        <a href="{{ action('Admin\CommentController@delete', ['id' => $comment->id]) }}">削除する</a>
                    </div>
                </div>
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
                        <textarea name="body" cols="80" rows="6">{{ old('body') }}</textarea>
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="hidden" value="{{ $post->id }}" name="articleId">
                <input type="submit" class="btn btn-primary" value="コメントを投稿">
            </form>
            <a class="js-modal-close c-modal_close" href=""><span>閉じる</span></a>
        </div>
    </div>
</div>
@endsection