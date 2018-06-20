<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobtablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobtables', function (Blueprint $table) {
            $table->increments('id');
            $table->text('job_title');
            $table->text('job_position');
            $table->text('job_description');
            $table->text('job_location');
            $table->text('job_department');
            $table->date('expiry_date');
            $table->text('job_type');
            $table->text('job_salary');
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
        Schema::dropIfExists('jobtables');
    }
}
