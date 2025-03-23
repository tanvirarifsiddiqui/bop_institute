<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('course_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Spring 2025"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_sessions');
    }
}
