@extends('layouts.app')

@section('title', 'マイページ')

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
        <h2 class="h3 my-4">マイページ</h2>
    </div>
    <h3 class=" h5">プロフィール</h3>
    {{-- マイデータをカード表示する($user_dataはControllerからAuth::user()->idで一致したもの受け取る) --}}
    <div class="row">
        <div class="card col-md-8 p-0">
            <div class="card-header bg-dark text-white py-1">
                @isset($user_data->user_image_path)
                <img class="prof-image float-left" src="{{ $user_data->user_image_path }}">
                @else
                <img class="prof-image float-left" src="{{ '/images/defaulte_user.jpg' }}">
                @endisset
                <span class="float-left pl-2 pt-3">
                    名前：{{ $user_data->name }}
                </span>
            </div>
            <div class="card-body">
                {{ $user_data->introduction }}
            </div>
            <div class="card-footer">
                <a href="{{ action('Admin\ProfileController@edit', ['id' => $user_data->id]) }}">編集する</a>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="card col-md-8 offset-left-2 mt-2 p-4">
            <h5>◆効率よく筋肉量を増やすための目標カロリー</h5>
            @if($building_intakes->calculate_exist(Auth::user()->id))
            {{-- 各項目にBuildモデルから変数を格納する --}}
            <ul>
                <li>計算したときの体重： {{ $building_intakes->body_weight }} kg
                <li>計算したときの体脂肪率： {{ $building_intakes->body_fat_percentage }} %
                <li>1日の目標カロリー： {{ $building_intakes->building_target_calories }} kCal
                <li>1日の目標たんぱく質：{{ $building_intakes->building_target_trotein }} g
                <li>1日の目標脂質：{{ $building_intakes->building_target_lipid }} g
                <li>1日の目標糖質：{{ $building_intakes->building_target_carbohydrate }} g
            </ul>
            <a href="{{ url('/calculate/building_intake') }}" class="btn btn-primary col-md-2">再度計算する</a>
            <a href="{{ url('/calculate/building_intake') }}" class="btn btn-danger col-md-2">結果を削除</a>
            @else
            <div>
                <p>まだ計算結果はありません。</p>
                <a href="{{ url('/calculate/building_intake') }}">→こちらから計算できます</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection