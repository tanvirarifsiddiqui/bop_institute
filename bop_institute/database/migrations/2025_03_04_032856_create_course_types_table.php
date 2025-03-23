<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTypesTable extends Migration
{
    public function up()
    {
        Schema::create('course_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Example values: "Long Courses", "Short Courses", "Industrial Attachment Programs"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_types');
    }
}
