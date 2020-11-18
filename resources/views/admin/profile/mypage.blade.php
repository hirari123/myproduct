@extends('layouts.app')

@section('title', 'マイページ')

{{-- ナビゲーションバー --}}
@section('navbar-left')
<li>
    <a class="nav-link" href="{{ url('/admin/articles') }}">
        みんなの投稿
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/admin/users') }}">
        みんなのプロフィール
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/calculate/building_intake') }}">
        効率よく筋肉量を増やす
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/calculate/sixpacking_intake') }}">
        最速で腹筋を割る
    </a>
</li>
@endsection

{{-- ここからコンテンツ --}}
@section('content')
<div class="container mt-3">
    <div class="row">
        <h2 class="h3 my-2">マイページ</h2>
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
                <a href="{{ action('Admin\ProfileController@edit', ['id' => $user_data->id]) }}">プロフィールを編集する</a>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="card col-md-8 mt-2 ml-3 p-4">
            <h5>◆効率よく筋肉量を増やすための目標カロリー</h5>
            @if($building_intakes->calculate_exist(Auth::user()->id))
            {{-- 各項目にモデルから変数を格納する --}}
            <ul>
                <li>最後に計算した日：{{ $building_intakes->updated_at->format('Y年m月d日')}}</li>
                <li>計算したときの体重： {{ $building_intakes->body_weight }} kg
                <li>計算したときの体脂肪率： {{ $building_intakes->body_fat_percentage }} %
                <li>1日の目標カロリー： {{ $building_intakes->building_target_calories }} kCal
                <li>1日の目標たんぱく質：{{ $building_intakes->building_target_protein }} g
                <li>1日の目標脂質：{{ $building_intakes->building_target_lipid }} g
                <li>1日の目標糖質：{{ $building_intakes->building_target_carbohydrate }} g
            </ul>
            <div class="form-group">
                <a href="{{ url('/calculate/building_intake') }}" class="btn btn-primary col-md-2 mx-1 p-1">再度計算する</a>
                <a href="{{ action('Calculate\BuildingIntakeController@delete') }}"
                    class="btn btn-danger col-md-2 mx-1 p-1">結果を削除</a>
            </div>
            @else
            <div>
                <p>まだ計算結果はありません。</p>
                <a href="{{ url('/calculate/building_intake') }}"
                    class="btn btn-success col-md-4 mx-1 p-1">こちらから計算できます</a>
            </div>
            @endif
        </div>
    </div>
    <div class="row my-3">
        <div class="card col-md-8 m-3 p-4">
            <h5>◆最速で腹筋を割るための目標カロリー</h5>
            @if($sixpacking_intakes->calculate_exist(Auth::user()->id))
            {{-- 各項目にモデルから変数を格納する --}}
            <ul>
                <li>最後に計算した日：{{ $sixpacking_intakes->updated_at->format('Y年m月d日')}}</li>
                <li>計算したときの体重： {{ $sixpacking_intakes->body_weight }} kg
                <li>1日の目標カロリー： {{ $sixpacking_intakes->sixpacking_target_calories }} kCal
                <li>1日の目標たんぱく質：{{ $sixpacking_intakes->sixpacking_target_protein }} g
                <li>1日の目標脂質：{{ $sixpacking_intakes->sixpacking_target_lipid }} g
                <li>1日の目標糖質：{{ $sixpacking_intakes->sixpacking_target_carbohydrate }} g
            </ul>
            <div class="form-group">
                <a href="{{ url('/calculate/sixpacking_intake') }}" class="btn btn-primary col-md-2 mx-1 p-1">再度計算する</a>
                <a href="{{ action('Calculate\SixpackingIntakeController@delete') }}"
                    class="btn btn-danger col-md-2 mx-1 p-1">結果を削除</a>
            </div>
            @else
            <div>
                <p>まだ計算結果はありません。</p>
                <a href="{{ url('/calculate/sixpacking_intake') }}"
                    class="btn btn-success col-md-4 mx-1 p-1">こちらから計算できます</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection