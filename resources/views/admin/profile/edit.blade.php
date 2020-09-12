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
        <br>
        <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">

          @error('user_name')
            <tr><td>{{$message}}</td></tr>
          @enderror

          <div class="form-group row">
            <label class="col-md-3" for="name">ユーザー名</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="name" value="{{ $user_data->name }}">
            </div>
          </div>
          <br>

          @error('introduction')
            <tr><td>{{$message}}</td></tr>
          @enderror
          <div class="form-group row">
            <label class="col-md-3" for="introduction">自己紹介</label>
            <div class="col-md-9">
              <textarea class="form-control" name="introduction" cols="30" rows="6">{{ $user_data->introduction }}</textarea>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-4 offset-md-3">
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