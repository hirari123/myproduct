@extends('layouts.app')

{{-- タイトルを埋め込む --}}
@section('title', 'ユーザー情報の編集')

{{-- コンテンツを埋め込む --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3 class="mt-2 mb-2">ユーザー情報の編集</h2>
                <br>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post"
                    enctype="multipart/form-data">

                    @error('user_name')
                    <tr>
                        <td>{{$message}}</td>
                    </tr>
                    @enderror

                    <div class="form-group row">
                        <label class="col-md-2" for="name">ユーザー名</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" value="{{ $user_data->name }}">
                        </div>
                    </div>
                    <br>

                    @error('introduction')
                    <tr>
                        <td>{{$message}}</td>
                    </tr>
                    @enderror
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">紹介文</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="introduction" cols="30"
                                rows="6">{{ $user_data->introduction }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 offset-md-2">
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