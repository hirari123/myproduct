{{-- レイアウトを読み込む --}}
@extends('layouts.app')

{{-- タイトルを埋め込む --}}
@section('title', 'コメントの編集')

{{-- コンテンツを埋め込む --}}
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto mt-4 mb-4">
        <h3>コメントの編集</h3>
        <form action="{{ action('Admin\CommentController@update') }}" method="post" enctype="multipart/form-data">
          <!-- バリデーションで返すメッセージを表示 -->
          @error('body')
            <tr><td>{{$message}}</td></tr>
          @enderror

          <div class="form-group row">
            <div class="col-md-10">
              <textarea class="form-control" name="body" cols="50" rows="6">{{ $comment_form->body }}</textarea>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-10">
              <input type="hidden" name="id" value="{{ $comment_form->id }}">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="更新">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection