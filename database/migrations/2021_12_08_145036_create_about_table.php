<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('title_aboutus');
            $table->string('description_aboutus',400);
            $table->string('title_cards');
            $table->string('description_cards',400);
            $table->string('title2_cards');
            $table->string('description2_cards',400);
            $table->string('title3_cards');
            $table->string('description3_cards',400);
            $table->string('tab1');
            $table->string('tab2');
            $table->string('tab3');
            $table->string('tab4');
            $table->longText('tab1_description');
            $table->longText('tab2_description');
            $table->longText('tab3_description');
            $table->longText('tab4_description');
            $table->string('confused_features');
            $table->string('trial_days');
            $table->string('offer');
            $table->longText('offer_description');
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
        Schema::dropIfExists('about');
    }
}
