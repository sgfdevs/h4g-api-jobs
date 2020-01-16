<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJobsAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function ($table) {
            $table->text('description')->after('title')
                ->nullable()
                ->default(null);

            // full_time, part_time, internship, casual, temporary, contractor
            $table->string('job_type', 16)->after('description')
                ->nullable()
                ->default(null);

            // high_school, associate, bachelor, master, doctorate
            $table->string('req_education', 64)->after('pay_rate')
                ->nullable()
                ->default(null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('req_education');
            $table->dropColumn('job_type');
            $table->dropColumn('description');
        });
    }
}
