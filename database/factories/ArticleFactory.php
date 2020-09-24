<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        // ここにテストデータを定義
        'user_name' => "テストユーザー",
        'body' => "これはテスト投稿の本文です。これはテスト投稿の本文です。これはテスト投稿の本文です。これはテスト投稿の本文です。これはテスト投稿の本文です。これはテスト投稿の本文です。",
    ];
});
