<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOldRankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_rank', function (Blueprint $table) {
            $table->integer('old_player_rank_id')->unsigned();
            $table->integer('old_rank')->default(0)->nullable();

            $table->timestamps();

            $table->primary(['old_player_rank_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('old_rank');
    }
}
