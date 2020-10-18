@extends('layouts.app')

@section('title', 'ユーザー情報の編集')

{{-- ナビゲーションバー --}}
@section('navbar-left')
<li>
    <a class="nav-link" href="{{ url('/admin/articles') }}">
        みんなの投稿一覧
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/admin/users') }}">
        みんなのプロフィール一覧
    </a>
</li>
@endsection

{{-- ここからコンテンツ --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3 class="mt-2 mb-2">ユーザー情報の編集</h3>
            <br>
            <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">

                {{-- ユーザー名の項目 --}}
                @error('user_name')
                <tr>
                    <td>{{$message}}</td>
                </tr>
                @enderror
                <div class="form-group row">
                    <label class="col-md-2" for="name">ユーザー名</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ optional($user_data)->name }}">
                    </div>
                </div>
                <br>

                {{-- プロフィール本文の項目 --}}
                @error('introduction')
                <tr>
                    <td>{{$message}}</td>
                </tr>
                @enderror
                <div class="form-group row">
                    <label class="col-md-2" for="introduction">プロフィール</label>
                    <div class="col-md-9">
                        <textarea id="countUp" class="form-control" name="introduction" cols="30"
                            rows="5">{{ optional($user_data)->introduction }}</textarea>
                        <label class="badge badge-secondary px-3 py-1 float-right">
                            <span id="count1">0</span>
                            <span> / 120</span>
                        </label>
                    </div>
                </div>

                {{-- ユーザー画像の項目 --}}
                <div class="form-group row">
                    <label class="col-md-2" for="image">トップ画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                        <div class="form-text text-info">
                            設定中の画像ファイル： {{ optional($user_data)->user_image_path }}
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除する
                            </label>
                        </div>
                    </div>
                </div>

                {{-- 更新ボタン --}}
                <div class="form-group row">
                    <div class="col-md-4 offset-md-2">
                        <input type="hidden" name="id" value="{{ optional($user_data)->id }}">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="更新">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection