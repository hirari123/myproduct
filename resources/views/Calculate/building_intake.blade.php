@extends('layouts.app')

@section('title', '効率よく筋肉量を増やすための目標カロリー計算')

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
        <div class="col-md-10 mx-auto">
            <h3 class="mt-2">効率よく筋肉を増やすための目標摂取カロリーを計算しよう</h3>
            <br>
            <img class="eye-catche mb-4" src="{{ '/images/training.jpg' }}">
            <br>
            <p>しっかりと筋トレをしているのに筋肉が増えないというのはよくあること。</p>
            <p>その原因としては、</p>
            <ol>
                <li>腸内環境の悪化(十分に栄養が吸収できていない)</li>
                <li>甲状腺機能の異常(ホルモンバランスによる代謝の低下)</li>
                <li>単純にカロリー不足</li>
            </ol>
            <p>の3つが考えられます。</p>
            <br>
            <p>しかしほとんどの場合は単純にカロリーが不足しているだけだと考えてよいでしょう。</p>
            <p>このため1日の食事でどれだけのカロリーが必要かを把握しておきたいものです。</p>
            <br>
            <p>こちらでは各種研究結果を参考に、体重と体脂肪率から目標の摂取量を簡単に計算できます。</p>
            <p>また併せてタンパク質・脂質・糖質の目安の摂取量も算出します。</p>
            <br>
            <p>以下の計算方法にて算出します。</p>
            <ol>
                <li>目標総カロリー(kCal) = 除脂肪体重(kg) × 44</li>
                <li>目標タンパク質摂取量(g) = 体重(kg) × 1.6(g)</li>
                <li>目標脂質摂取量(g) = 目標総カロリー(kCal) × 30% / 9</li>
                <li>目標糖質摂取量(g) = (目標総カロリー(kCal) - (目標タンパク質摂取量(g) * 4) - (目標脂質摂取量(g) * 9)) / 4</li>
            </ol>
            <p>フォームに体重と体脂肪率を入力すると計算を行います。</p>

            <form action="{{ action('Calculate\BuildingIntakeController@create') }}" method="post"
                enctype="multipart/form-data">
                {{-- 体重の入力(※要バリデーション追加！) --}}
                <div class="form-group row">
                    <label class="col-md-2" for="name">現在の体重(kg)</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control js-building-intake" name="body_weight" value="">
                    </div>
                </div>
                <br>
                {{-- 体脂肪率の入力(※要バリデーション追加！) --}}
                <div class="form-group row">
                    <label class="col-md-2" for="name">現在の体脂肪率(%)</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control js-building-intake" name="body_fat_percentage" value="">
                    </div>
                </div>
                <br>

                {{-- 計算結果を表形式で表示する(初期値は0でajaxで計算結果を上書きする) --}}
                <table border="1" width="300" class="ml-4 text-center">
                    <tr>
                        <th>項目</th>
                        <th>計算結果</th>
                    </tr>
                    <tr>
                        <td>除脂肪体重(kg)</td>
                        <td class="lean-body-mass">0</td>
                    </tr>
                    <tr>
                        <td>1日の目標カロリー(kCal)</td>
                        <td class="building-target-calories">0</td>
                    </tr>
                    <tr>
                        <td>目標たんぱく質摂取量(g)</td>
                        <td class="building-target-protein">0</td>
                    </tr>
                    <tr>
                        <td>目標脂質摂取量(g)</td>
                        <td class="building-target-lipid">0</td>
                    </tr>
                    <tr>
                        <td>目標糖質摂取量(g)</td>
                        <td class="building-target-carbohydrate">0</td>
                    </tr>
                </table>
                {{-- 登録/更新ボタン --}}
                <br>
                <p>計算結果を登録すればマイページでいつでも確認することができます。</p>
                <div class="form-group row my-4 mx-auto">
                    <div class="col-md-8">
                        {{-- <input type="hidden" name="id" value="{{ Auth::user()->id }}"> --}}
                        <input type="hidden" name="lean-body-mass" value="">
                        <input type="hidden" name="building-target-calories" value="">
                        <input type="hidden" name="building-target-protein" value="">
                        <input type="hidden" name="building-target-lipid" value="">
                        <input type="hidden" name="building-target-carbohydrate" value="">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="マイデータに登録/更新">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection