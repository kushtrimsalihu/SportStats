<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote', function (Blueprint $table)
        {
            $table->id();
            $table->BigInteger('user')->unsigned();
            $table->foreign('user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->BigInteger('daily_vote')->unsigned();
            $table->foreign('daily_vote')->references('id')->on('dailyvote')->onUpdate('cascade')->onDelete('cascade');
            $table->BigInteger('team')->unsigned();
            $table->foreign('team')->references('team_id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('vote');
    }
}
