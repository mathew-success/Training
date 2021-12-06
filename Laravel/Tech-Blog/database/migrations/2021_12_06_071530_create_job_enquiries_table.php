<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->unsignedBigInteger('job_id')->nullable();
            $table->foreign('job_id')->on('jobs')->references('id')->cascadeOnUpdate()->cascadeOnUpdate();
            $table->string('ug')->nullable();
            $table->string('pg')->nullable();
            $table->string('college');
            $table->string('university');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->on('countries')->references('id')->cascadeOnUpdate()->cascadeOnUpdate();
            $table->text('address');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('job_enquiries');
    }
}
