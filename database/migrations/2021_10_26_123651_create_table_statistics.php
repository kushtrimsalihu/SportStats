<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStatistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->integer('total_shots')->default(0)->nullable();
            $table->integer('on_shots')->default(0)->nullable();
            $table->integer('minutes')->default(0)->nullable();
            $table->integer('appearences')->default(0)->nullable();
            $table->integer('total_goals')->default(0)->nullable();
            $table->integer('conceded_goals')->default(0)->nullable();
            $table->integer('assists_goals')->default(0)->nullable();
            $table->integer('saves_goals')->default(0)->nullable();
            $table->integer('total_passes')->default(0)->nullable();
            $table->integer('key_passes')->default(0)->nullable();
            $table->integer('accuracy_passes')->default(0)->nullable();
            $table->integer('total_tackles')->default(0)->nullable();
            $table->integer('blocks_tackles')->default(0)->nullable();
            $table->integer('interceptions_tackles')->default(0)->nullable();
            $table->integer('total_duels')->default(0)->nullable();
            $table->integer('won_duels')->default(0)->nullable();
            $table->integer('attempts_dribbles')->default(0)->nullable();
            $table->integer('success_dribbles')->default(0)->nullable();
            $table->integer('past_dribbles')->default(0)->nullable();
            $table->integer('drawn_fouls')->default(0)->nullable();
            $table->integer('committed_fouls')->default(0)->nullable();
            $table->integer('won_penalty')->default(0)->nullable();
            $table->integer('commited_penalty')->default(0)->nullable();
            $table->integer('scored_penalty')->default(0)->nullable();
            $table->integer('missed_penalty')->default(0)->nullable();
            $table->integer('saved_penalty')->default(0)->nullable();
            $table->integer('yellow_cards')->default(0)->nullable();
            $table->integer('red_cards')->default(0)->nullable();
            $table->decimal('score', 3, 1)->default(0)->nullable();

            $table->timestamps();

            $table->BigInteger('league')->unsigned();
            $table->foreign('league')->references('id')->on('league')->onUpdate('cascade')->onDelete('cascade');

            $table->BigInteger('player')->unsigned();
            $table->foreign('player')->references('player_id')->on('players')->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['league','player']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}