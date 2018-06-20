<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventtablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventtables', function (Blueprint $table) {
            $table->increments('id');
            $table->text('event_title');
            $table->string('slug')->unique();
            $table->text('event_description');
            $table->text('event_address');
            $table->text('event_venue');
            $table->text('event_image');
            $table->date('event_date_from');
            $table->date('event_date_to')->nullable();

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
        Schema::dropIfExists('eventtables');
    }
}
