<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('competition');
            $table->date('play_date');
            $table->string('versus');
            $table->integer('first_score_in');
            $table->integer('second_score_in');
            $table->integer('third_score_in');
            $table->integer('fourth_score_in');
            $table->integer('first_score_out');
            $table->integer('second_score_out');
            $table->integer('third_score_out');
            $table->integer('fourth_score_out');
            $table->integer('score_in');
            $table->integer('score_out');
            $table->string('h_point');
            $table->string('h_rebound');
            $table->string('h_assist');
            $table->string('h_steal');
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
        Schema::dropIfExists('results');
    }
}
