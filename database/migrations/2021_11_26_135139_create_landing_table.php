<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_page', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description',400);
            $table->string('image')->nullable();
             $table->string('title_aboutus');
            $table->string('description_aboutus');
            $table->string('title_cards');
            $table->string('description_cards');
            $table->string('title2_cards');
            $table->string('description2_cards');
            $table->string('title3_cards');
            $table->string('description3_cards');
            $table->string('image_admin')->nullable();
            $table->string('title_admin');
            $table->string('description_admin',700);
            $table->string('image_user')->nullable();
            $table->string('title_user');
            $table->string('description_user',700);
            $table->string('tab1');
            $table->string('tab2');
            $table->string('tab3');
            $table->string('tab4');
            $table->longText('tab1_description');
            $table->longText('tab2_description');
            $table->longText('tab3_description');
            $table->longText('tab4_description');


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
        Schema::dropIfExists('landing_page');
    }
}
