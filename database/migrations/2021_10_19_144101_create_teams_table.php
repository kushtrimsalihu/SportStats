<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->primary();
            $table->string('name');
            $table->string('country');
            $table->integer('founded')->nullable();
            $table->boolean('national');
            $table->mediumText('logo');
            $table->BigInteger('league')->unsigned();
            $table->foreign('league')->references('id')->on('league')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();


            //$table->BigInteger('sports_id')->unsigned();
            //table->foreign('sports_id')->references('sports_id')->on('sports')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
