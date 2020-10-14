@extends('layouts.app')

@section('title', '投稿の詳細画面')

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

{{-- ここからコンテンツ --}}
@section('content')
<div class="container">
    <div class="row">
        <h2 class="h4 mt-2 ml-2">投稿記事の詳細</h2>
    </div>

    {{-- 投稿本体 --}}
    <div class="row">
        <div class="col-md-11 mx-auto">
            <a href="{{ action('Admin\ArticleController@index') }}">← 投稿一覧に戻る</a>
            <div class="card mb-2" style="max-width: 50em">
                <div class="card-header bg-dark text-white">
                    投稿した人：{{ $post->user_name }}
                    <span class="float-right">
                        投稿日時 {{ $post->created_at->format('Y年m月d日 H:i') }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        {!! nl2br(e($post->body)) !!}
                        @if( $post->edited_at != null)
                        <div class="float-right">
                            <br>
                            [{{ $post->edited_at->format('Y年m月d日 H:i') }}編集]
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <span class="badge badge-secondary">
                        コメント {{ $post->comments->count() }}件
                    </span>
                    <div class="card-link float-right">
                        <a href="{{ action('Admin\ArticleController@edit', ['id' => $post->id]) }}">編集する</a>
                        <a href="{{ action('Admin\ArticleController@delete', ['id' => $post->id]) }}">削除する</a>
                    </div>
                </div>
            </div>


            {{-- 投稿に対するコメント一覧 --}}
            <div class="row">
                <div class="col-md-11 ml-4">
                    <a class="btn btn-primary mb-4 js-modal-open" href="" data-target="modal02">＋コメントする</a>
                    @if($post->comments->count() == 0)
                    <p class="mb-4">まだコメントはありません。</p>
                    @else
                    <h2 class="h5 mb-2">コメント一覧(新しい順)</h2>
                    @endif

                    @foreach ($post->comments as $comment)
                    <div class="card comment-list" style="max-width: 49em">
                        <div class="card-header bg-secondary text-white py-2">
                            コメントした人：{{ $comment->user_name }}
                            <span class="float-right">
                                コメント日時 {{ $comment->created_at->format('Y年m月d日 H:i') }}
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
                                <a
                                    href="{{ action('Admin\CommentController@delete', ['id' => $comment->id]) }}">削除する</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
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