<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingIntakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_intakes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('body_weight')->unsigned()->nullable();
            $table->float('body_fat_percentage')->unsigned()->nullable();
            $table->float('body_fat_mass')->unsigned()->nullable();
            $table->float('lean_body_mass')->unsigned()->nullable();
            $table->float('building_target_calories')->unsigned()->nullable();
            $table->float('building_target_protein')->unsigned()->nullable();
            $table->float('building_target_lipid')->unsigned()->nullable();
            $table->float('building_target_carbohydrate')->unsigned()->nullable();
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
        Schema::dropIfExists('building_intakes');
    }
}
