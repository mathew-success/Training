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
            $table->id();
            $table->string('title');
            $table->string('experience_from')->nullable();
            $table->string('experience_to')->nullable();
            $table->string('job_location');
            $table->string('job_type');
            $table->integer('leave_saturday')->default(0)->nullable();
            $table->string('working_hours_per_week');
            $table->text('description')->nullable();
            $table->string('work_role')->nullable();
            $table->string('communication');
            $table->integer('posted_by');
            $table->date('posted_date');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('jobs');
    }
}
