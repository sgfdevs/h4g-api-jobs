<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_posted');
            $table->date('date_updated');
            $table->date('date_expires');
            $table->unsignedInteger('employer_id');
            // name, category, naics
//            $table->unsignedInteger('location_id');
            // name, street, city, state, zip code, public transportation available
            $table->string('title', 64);
//            $table->string('description')->nullable();
//            $table->string('requirements')->nullable();
//            $table->string('properties')->nullable();
            $table->unsignedInteger('job_id');
//            $table->bigInteger('agency_job_id')->nullable();
            $table->string('pay_rate', 64)->nullable();
//            $table->tinyInteger('hours_per_week')->nullable();
//            $table->string('shift', 64)->nullable();
//            // Day, Evening/Swing, Graveyard, Night, Rotating, Flexible,
//            $table->string('req_experience', 64)->nullable();
//            // Minimum Experience Required: 12 months
//            $table->string('req_education', 64)->nullable();
//            // Minimum Education Level Required: No Minimum Education Requirement
//            $table->string('req_certification', 64)->nullable();
//            // Required License/Certification: No
//            $table->string('req_job_skills', 64)->nullable();
//            // The system currently has no job skills associated with the occupation for this job.
//            $table->string('req_tool_skills', 64)->nullable();
//            // The system currently has no tools and technology skills associated with the occupation for this job.
//            $table->string('req_security', 64)->nullable();
//            // Security Clearance Level Requirement: No Clearance
            $table->string('data_source')->nullable();
            $table->string('data_site')->nullable();
            $table->string('url')->nullable();
            $table->boolean('fake')->default(false);
            $table->timestamps();
            $table->softDeletes();

//            $table->foreign('employer_id')->references('id')->on('employers');
//            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('posts', function (Blueprint $table) {
//            $table->dropForeign('jobs_employer_id_foreign');
//            $table->dropForeign('jobs_location_id_foreign');
//        });

        Schema::dropIfExists('jobs');
    }
}
