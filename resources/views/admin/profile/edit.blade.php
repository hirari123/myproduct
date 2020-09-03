{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- タイトルを埋め込む --}}
@section('title', 'ユーザー情報の編集')

{{-- コンテンツを埋め込む --}}
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>ユーザー情報の編集</h2>
        <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
          <!-- バリデーションで返すメッセージを表示 -->
          @error('introduction')
            <tr><td>{{$message}}</td></tr>
          @enderror

          <div class="form-group row">
            <label class="col-md-2" for="name">ユーザー名</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="name" value="{{ $user_data->name }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="introduction">ひとこと</label>
            <div class="col-md-10">
              <textarea class="form-control" name="introduction" cols="30" rows="3">{{ $user_data->introduction }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-10">
              <input type="hidden" name="id" value="{{ $user_data->id }}">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="更新">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection