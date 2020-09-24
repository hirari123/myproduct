{{-- layouts/app.blade.phpを読み込む --}}
@extends('layouts.app')

{{-- タイトルを埋め込む --}}
@section('title', '投稿記事一覧')

<!-- 背景画像は変えたい,navbarを埋め込みたい -->
<!-- 背景画像はbodyタグにクラスを付ければ良い？ -->

{{-- コンテンツを埋め込む --}}
@section('content')
  <div class="container">
    <div class="row">
      <h2>投稿記事一覧</h2>
    </div>

    <div class="row">
    {{-- 投稿作成ボタン --}}
      <div class="col-md-4">
        <a class="btn btn-primary js-modal-open" href="" data-target="modal01">＋投稿作成</a>
      </div>

      {{-- 投稿の検索 --}}
      <div class="col-md-6 offset-md-2">
        <label for="serch">キーワードで投稿を検索</label>
        <form action="{{ action('Admin\ArticleController@index') }}" method="get" id="serch">
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-controll" name="cond_title" value="{{ $cond_title }}">
            </div>
            <div class="col-md-4">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="検索">
            </div>
          </div>
        </form>
      </div>
    </div>

    {{-- 投稿一覧 --}}
    {{-- 検索で取得した結果をforeachでカード表示する --}}
    <div class="row">
      <div class="col-md-10 mx-auto">
        @foreach ($articles as $post)
        <div class="post-list card" style="max-width: 50em">
          <div class="card-header bg-dark text-white">
            書いたひと：{{ $post->user_name }}
            <span class="float-right">
              投稿日時 {{ $post->created_at->format('Y年m月d日 H:i') }}
            </span>
          </div>
          <div class="card-body">
            <div class="card-text">
              {{ $post->body }}
              @if( $post->edited_at != null)
                <div class="float-right">
                  <br>
                  [{{ $post->edited_at->format('Y年m月d日 H:i') }}編集]
                </div>
              @endif
            </div>
          </div>
          <div class="card-footer bg-white">
            <a class="badge badge-secondary" href="{{ action('Admin\ArticleController@show', ['id' => $post->id]) }}">
                コメント {{ $post->comments->count() }}件
            </a>
            <a class="badge badge-primary" href="{{ action('Admin\ArticleController@show', ['id' => $post->id]) }}">
                コメントを追加する
            </a>
            <div class="card-link float-right">
              <a href="{{ action('Admin\ArticleController@edit', ['id' => $post->id]) }}">編集する</a>
              <a href="{{ action('Admin\ArticleController@delete', ['id' => $post->id]) }}">削除する</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>


  {{-- 投稿のモーダルウィンドウ --}}
  <div id="modal01" class="c-modal js-modal">
    <!-- 背景 -->
    <div class="c-modal_bg js-modal-close">
    </div>
    <!-- 本体 -->
    <div class="c-modal_content" >
      <div class="c-modal_content_inner">
        <h3>投稿を新規作成</h3>
        <form action="{{ action('Admin\ArticleController@create') }}" method="post" enctype="multipart/form-data" id="post-form">
          <!-- バリデーションメッセージを表示したい.. -->
          @error('body')
            <tr><td>{{$message}}</td></tr>
          @enderror
          <!-- 投稿本文 -->
          <div class="form-group row">
            <label class="col-md-2" for="body">投稿内容</label>
            <div class="col-md-10">
              <textarea name="body" cols="40" rows="5">{{ old('body') }}</textarea>
            </div>
          </div>
          <!-- 画像の投稿 -->
          <div class="form-group row">
            <label class="col-md-2" for="body">画像</label>
            <div class="col-md-10">
              <input type="file" class="form-control-file" name="image">
            </div>
          </div>

          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="投稿する">
        </form>
        <a class="js-modal-close c-modal_close" href=""><span>閉じる</span></a>
      </div>
    </div>
  </div>
@endsection