<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('market_id');
            $table->integer('week_id');
            $table->integer('lunes')->nullable();
            $table->integer('martes')->nullable();
            $table->integer('miercoles')->nullable();
            $table->integer('jueves')->nullable();
            $table->integer('viernes')->nullable();
            $table->integer('sabado')->nullable();
            $table->integer('domingo')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('market_id')->references('id')->on('markets');
            $table->foreign('week_id')->references('id')->on('weeks');

            $table->foreign('lunes')->references('id')->on('hours');
            $table->foreign('martes')->references('id')->on('hours');
            $table->foreign('miercoles')->references('id')->on('hours');
            $table->foreign('jueves')->references('id')->on('hours');
            $table->foreign('viernes')->references('id')->on('hours');
            $table->foreign('sabado')->references('id')->on('hours');
            $table->foreign('domingo')->references('id')->on('hours');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule');
    }
}
