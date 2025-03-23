<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('course_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_profile_id');
            $table->unsignedBigInteger('course_id');
            $table->enum('status', ['pending', 'approved', 'rejected', 'enrolled'])->default('pending');
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('student_profile_id')->references('id')->on('student_profiles')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_applications');
    }
}
