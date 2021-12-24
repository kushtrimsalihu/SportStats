<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivescoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livescore', function (Blueprint $table) {
            $table->id();
            $table->string('league_name_sdn')->nullable();
            $table->string('team1_name_nm')->nullable();
            $table->string('team2_name_nm')->nullable();
            $table->string('team1_goal_tr1')->nullable();
            $table->string('team2_goal_tr2')->nullable();
            $table->string('team1_t1_img')->nullable();
            $table->string('team2_t2_img')->nullable();

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livescore');
    }
}
