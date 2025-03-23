<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_code')->unique(); // Manually assigned by admin
            $table->unsignedBigInteger('program_id');
            $table->string('name');
            $table->decimal('course_fee', 10, 2);
            $table->string('duration'); // e.g., "2 Years", "40 Hours"
            $table->enum('mode', ['online', 'offline']);
            $table->boolean('apply_option')->default(true);

            // Polymorphic relation for course session (Long Courses) or batch (Short/Industrial Courses)
            $table->unsignedBigInteger('courseable_id')->nullable();
            $table->string('courseable_type')->nullable();

            $table->timestamps();

            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
