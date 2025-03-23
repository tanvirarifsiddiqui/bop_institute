<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_type_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('course_type_id')->references('id')->on('course_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
