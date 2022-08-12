<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournamemts', function (Blueprint $table) {
            $table->id();
            $table->integer('play_year')->nullable();;
            $table->string('competition')->nullable();;
            $table->string('team11')->nullable();;
            $table->string('team12')->nullable();;
            $table->string('team13')->nullable();;
            $table->string('team14')->nullable();;
            $table->string('team15')->nullable();;
            $table->string('team16')->nullable();;
            $table->string('team17')->nullable();;
            $table->string('team18')->nullable();;
            $table->string('team21')->nullable();;
            $table->string('team22')->nullable();;
            $table->string('team23')->nullable();;
            $table->string('team24')->nullable();;
            $table->string('team31')->nullable();;
            $table->string('team32')->nullable();;
            $table->string('team41')->nullable();;
            $table->integer('score11')->nullable()->default(0);;
            $table->integer('score12')->nullable()->default(0);;
            $table->integer('score13')->nullable()->default(0);;
            $table->integer('score14')->nullable()->default(0);;
            $table->integer('score15')->nullable()->default(0);;
            $table->integer('score16')->nullable()->default(0);;
            $table->integer('score17')->nullable()->default(0);;
            $table->integer('score18')->nullable()->default(0);;
            $table->integer('score21')->nullable()->default(0);;
            $table->integer('score22')->nullable()->default(0);;
            $table->integer('score23')->nullable()->default(0);;
            $table->integer('score24')->nullable()->default(0);;
            $table->integer('score31')->nullable()->default(0);;
            $table->integer('score32')->nullable()->default(0);;
            $table->integer('score41')->nullable()->default(0);;
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
        Schema::dropIfExists('tournamemts');
    }
}
