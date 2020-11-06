@extends('layouts.app')

@section('title', 'コメントの編集')

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
<li>
    <a class="nav-link" href="{{ url('/calculate/building_intake') }}">
        目標摂取カロリー計算
    </a>
</li>
@endsection

{{-- ここからコンテンツ --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-4 mb-4">
            <h3>コメントの編集</h3>
            <form action="{{ action('Admin\CommentController@update') }}" method="post" enctype="multipart/form-data">
                @error('body')
                <tr>
                    <td>{{$message}}</td>
                </tr>
                @enderror

                <div class="form-group row">
                    <div class="col-md-10">
                        <textarea id="countUp" class="form-control" name="body" cols="50" rows="6">
                            {{ $comment_form->body }}
                        </textarea>
                        <label class="badge badge-secondary px-3 py-1 my-2 float-right">
                            <span id="count1">0</span>
                            <span> / 120</span>
                        </label>
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