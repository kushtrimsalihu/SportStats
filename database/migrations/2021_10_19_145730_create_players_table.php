<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->unsignedBigInteger('player_id')->primary();
            $table->string('photo');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('age')->nullable();
            $table->string('height')->nullable();
            $table->string('nationality')->nullable();
            $table->string('place')->nullable();
            $table->string('position')->nullable();
            $table->BigInteger('teams')->unsigned();
            $table->foreign('teams')->references('team_id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('players');
    }
}
