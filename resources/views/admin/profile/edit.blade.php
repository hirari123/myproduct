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
          @if (count($errors) > 0)
            <ul>
              @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endif
          <div class="form-group row">
            <label class="col-md-2" for="name">ユーザー名</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="name" value="{{ $user_form->name }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="introduction">ひとこと</label>
            <div class="col-md-10">
              <textarea class="form-control" name="introduction" cols="30" rows="3">{{ $user_form->introduction }}</textarea>
            </div>
          </div>
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="更新">
        </form>
      </div>
    </div>
  </div>
@endsection