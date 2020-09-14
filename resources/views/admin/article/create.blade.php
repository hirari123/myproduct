{{-- モーダルを実装したのでそもそもこのファイルは不要では？？ --}}
{{-- レイアウトを読み込む --}}
@extends('layouts.app')

{{-- タイトルを埋め込む --}}
@section('title', '新規投稿')

{{-- コンテンツを埋め込む --}}
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>投稿の新規作成画面</h2>
        <form action="{{ action('Admin\ArticleController@create') }}" method="post" enctype="multipart/form-data">
          <!-- バリデーションで返すメッセージを表示 -->
          @error('body')
            <tr><td>{{$message}}</td></tr>
          @enderror

          <div class="form-group row">
            <label class="col-md-2" for="body">投稿内容</label>
            <div class="col-md-10">
              <textarea class="form-control" name="body" cols="30" rows="6">{{ old('body') }}</textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2" for="body">画像</label>
            <div class="col-md-10">
              <input type="file" class="form-control-file" name="image">
            </div>
          </div>
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="投稿する">
        </form>
      </div>
    </div>
  </div>
@endsection