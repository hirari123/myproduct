{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- タイトルを埋め込む --}}
@section('title', '投稿記事一覧')

{{-- コンテンツを埋め込む --}}
@section('content')
  <div class="container">
    <div class="row">
      <h2>投稿記事一覧画面</h2>
    </div>
    <div class="row">
      {{-- 新規投稿ボタン --}}
      <div class="col-md-4">
        {{-- <a href="{{ action('Admin\ArticleController@add') }}" role="button" class="btn btn-primary">新規作成</a> --}}
        <a class="btn btn-primary js-modal-open" href="" data-target="modal01">新規投稿する</a>
        {{-- <button class="btn btn-primary js-modal-open" roll="button" data-target="#modal01">新規投稿</button> --}}
      </div>

      {{-- モーダルウィンドウ --}}
      <div id="modal01" class="c-modal js-modal">
        <!-- 背景 -->
        <div class="c-modal_bg js-modal-close">
        </div>
        <!-- 本体 -->
        <div class="c-modal_content">
          <div class="c-modal_content_inner">
            <h2>投稿の新規作成画面</h2>
            <form action="{{ action('Admin\ArticleController@create') }}" method="post" enctype="multipart/form-data" id="post-form">
              <!-- バリデーションメッセージを表示 -->
              @error('body')
                <tr><td>{{$message}}</td></tr>
              @enderror
              <!-- 投稿本文 -->
              <div class="form-group row">
                <label class="col-md-2" for="body">投稿内容</label>
                <div class="col-md-10">
                  {{-- <textarea class="form-control" name="body" cols="30" rows="6">{{ old('body') }}</textarea> --}}
                  <textarea name="body" cols="30" rows="6">{{ old('body') }}</textarea>
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

      {{-- 投稿の検索 --}}
      <div class="col-md-8">
        <form action="{{ action('Admin\ArticleController@index') }}" method="get">
          <div class="form-group row">
            <div class="col-md-8">
              <input type="text" class="form-controll" name="cond_title" value="{{ $cond_title }}">
            </div>
            <div class="col-md-2">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="検索">
            </div>
          </div>
        </form>
      </div>
    </div>

    {{-- 検索で取得した結果をforeachで表示する --}}
    <div class="row">
      <div class="list-news col-md-12 mx-auto">
        <div class="row">
          <table class="table table-dark">
            <thead>
              <tr>
                <th width="10%">ID</th>
                <th width="40%">本文</th>
                <th width="20%">操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($articles as $article)
                <tr>
                  <th>{{ $article->id }}</th>
                  <td>{{ $article->body }}</td>
                  <td>
                    <div>
                    <a href="{{ action('Admin\ArticleController@edit', ['id' => $article->id]) }}">編集する</a>
                    </div>
                    <div>
                    <a href="{{ action('Admin\ArticleController@delete', ['id' => $article->id]) }}">削除する</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection