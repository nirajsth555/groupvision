<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinesstablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesstables', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('slogan');
            $table->text('front_image');
            $table->text('single_page_image');
            $table->text('business_intro');
            $table->text('business_website');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('businesstables');
    }
}
