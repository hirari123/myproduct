<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // usersテーブルにintroductionとuser_image_pathカラムを追加する
            $table->string('introduction')->nullable(); // 自己紹介文
            $table->string('user_image_path')->nullable(); // ユーザー画像パス
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('introduction')->nullable(); // 自己紹介文
            $table->dropColumn('user_image_path')->nullable(); // ユーザー画像パス
        });
    }
}
