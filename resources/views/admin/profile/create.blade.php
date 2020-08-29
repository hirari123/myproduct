{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- タイトルを埋め込む --}}
@section('title', '新規プロフィール')

{{-- コンテンツを埋め込む --}}
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>プロフィールの新規作成画面</h2>
        <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
          @if (count($errors) > 0)
            <ul>
              @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endif
          <div class="form-group row">
            <label class="col-md-2" for="name">名前(ニックネーム)</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="body">プロフィール文</label>
            <div class="col-md-10">
              <textarea class="form-control" name="body" cols="30" rows="10">{{ old('body') }}</textarea>
            </div>
          </div>
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="登録する">
        </form>
      </div>
    </div>
  </div>
@endsection