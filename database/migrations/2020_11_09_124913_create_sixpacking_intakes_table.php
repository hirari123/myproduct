<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSixpackingIntakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sixpacking_intakes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('body_weight')->unsigned()->nullable();
            $table->float('sixpacking_target_calories')->unsigned()->nullable();
            $table->float('sixpacking_target_protein')->unsigned()->nullable();
            $table->float('sixpacking_target_lipid')->unsigned()->nullable();
            $table->float('sixpacking_target_carbohydrate')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sixpacking_intakes');
    }
}
