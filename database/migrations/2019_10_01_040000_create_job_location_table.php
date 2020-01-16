<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_location', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('location_id');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['job_id', 'location_id']);
            $table->foreign('job_id')->references('id')->on('jobs')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('location_id')->references('id')->on('locations')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_location');
    }
}
