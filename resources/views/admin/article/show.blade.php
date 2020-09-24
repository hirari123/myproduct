@extends('layouts.app')

@section('title', '投稿の詳細画面')

@section('content')
<div class="container">
  <div class="row">
    <h2>投稿記事一覧</h2>
  </div>

  <div class="row">
  {{-- ここに投稿本体が入る？ --}}

  {{-- コメントをforeachでカード表示する --}}
  {{-- $commentがうまく格納できていない？ --}}
  <div class="row">
    <div class="col-md-10 mx-auto">
      @foreach ($comments as $comment)
      <div class="post-list card" style="max-width: 50em">
        <div class="card-header bg-dark text-white">
          コメントした人：{{ $comment->user_name }}
          <span class="float-right">
            コメント日時 {{ $comment->created_at->format('Y年m月d日 H:i') }}
          </span>
        </div>
        <div class="card-body">
          <div class="card-text">
            {{ $comment->body }}
            @if( $comment->edited_at != null)
              <div class="float-right">
                <br>
                [{{ $comment->edited_at->format('Y年m月d日 H:i') }}編集]
              </div>
            @endif
          </div>
        </div>
        <div class="card-footer bg-white">
          <div class="card-link float-right">
            {{-- <a href="{{ action('Admin\CommentController@edit', ['id' => $comment->id]) }}">編集する</a> --}}
            {{-- <a href="{{ action('Admin\CommentController@delete', ['id' => $comment->id]) }}">削除する</a> --}}
          </div>
        </div>
      </div>
      @endforeach
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