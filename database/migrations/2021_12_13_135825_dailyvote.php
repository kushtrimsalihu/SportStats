<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dailyvote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailyvote', function (Blueprint $table)
        {
            $table->id();
            $table->BigInteger('team1')->unsigned();
            $table->foreign('team1')->references('team_id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
            $table->BigInteger('team2')->unsigned();
            $table->foreign('team2')->references('team_id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('dailyvote');
    }
}
