{{-- レイアウトを読み込む --}}
@extends('layouts.app')

{{-- タイトルを埋め込む --}}
@section('title', '投稿の編集')

{{-- コンテンツを埋め込む --}}
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto mt-4 mb-4">
        <h3>投稿の編集画面</h3>
        <form action="{{ action('Admin\ArticleController@update') }}" method="post" enctype="multipart/form-data">
          <!-- バリデーションで返すメッセージを表示 -->
          @error('body')
            <tr><td>{{$message}}</td></tr>
          @enderror

          <div class="form-group row">
            <label class="col-md-2" for="body">投稿内容</label>
            <div class="col-md-10">
              <textarea class="form-control" name="body" cols="50" rows="6">{{ $article_form->body }}</textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2" for="image">画像</label>
            <div class="col-md-10">
              <input type="file" class="form-control-file" name="image">
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