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
      <div class="col-md-4">
        <a href="{{ action('Admin\ArticleController@add') }}" role="button" class="btn btn-primary">新規作成</a>
      </div>
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
                <th width="10%">投稿ID</th>
                <th width="10%">投稿者</th>
                <th width="40%">本文</th>
                <th width="20%">操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($articles as $post)
                <tr>
                  <th>{{ $post->id }}</th>
                  <th>{{ $post->user_name }}</th>
                  <td>{{ $post->body }}</td>
                  <td>
                    <div>
                    <a href="{{ action('Admin\ArticleController@edit', ['id' => $post->id]) }}">編集する</a>
                    </div>
                    <div>
                    <a href="{{ action('Admin\ArticleController@delete', ['id' => $post->id]) }}">削除する</a>
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