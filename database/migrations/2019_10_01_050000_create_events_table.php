<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date_begin');
            $table->dateTime('date_end');
            $table->string('title', 100);
            $table->unsignedInteger('location_id');
            // name, street, city, state, zip code
            $table->unsignedInteger('event_id');
            $table->string('description')->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('email', 100)->nullable();
            $table->unsignedSmallInteger('cost')->nullable();
            $table->string('url');
            $table->string('url_image');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
