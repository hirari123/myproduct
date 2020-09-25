@extends('layouts.app')

@section('title', '投稿の詳細画面')

@section('content')
<div class="container">
  <div class="row">
    <h2 class="h4">投稿記事の詳細</h2>
  </div>

  <div class="row">
  {{-- 投稿本体 --}}
    <div class="col-md-10 mx-auto">
      <div class="post-list card" style="max-width: 50em">

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
          <div class="card-link float-right">
            <a href="{{ action('Admin\ArticleController@edit', ['id' => $post->id]) }}">編集する</a>
            <a href="{{ action('Admin\ArticleController@delete', ['id' => $post->id]) }}">削除する</a>
          </div>
        </div>
      </div>

      {{-- 投稿に対するコメント --}}
      <h2 class="h5 mb-4">コメント</h2>
      @forelse ($post->comments as $comment)
        <div class="border-top p-4">
          {!! nl2br(e($comment->body)) !!}
        </div>
      @empty
        <p>コメントはまだありません。</p>
      @endforelse

    </div>
  </div>
</div>

{{-- 投稿のモーダルウィンドウ
<div id="modal01" class="c-modal js-modal">
  <!-- 背景 -->
  <div class="c-modal_bg js-modal-close">
  </div>
  <!-- 本体 -->
  <div class="c-modal_content" >
    <div class="c-modal_content_inner">
      <h3>コメントする</h3>
      <form action="{{ action('Admin\CommentController@create') }}" method="post" enctype="multipart/form-data" id="post-form">
        <!-- バリデーションメッセージを表示したい.. -->
        @error('body')
          <tr><td>{{$message}}</td></tr>
        @enderror
        <!-- コメント本文 -->
        <div class="form-group row">
          <label class="col-md-2" for="body">コメント</label>
          <div class="col-md-10">
            <textarea name="body" cols="40" rows="5">{{ old('body') }}</textarea>
          </div>
        </div>

        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="投稿">
      </form>
      <a class="js-modal-close c-modal_close" href=""><span>閉じる</span></a>
    </div>
  </div>
</div>
--}}
@endsection