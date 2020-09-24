<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        // ここにテストデータを定義
        'user_name' => "テストユーザー",
        'body' => "これはテストコメント文です。これはテストコメント文です。これはテストコメント文です。これはテストコメント文です。これはテストコメント文です。",
    ];
});
