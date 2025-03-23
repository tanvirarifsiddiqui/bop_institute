<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // Assumes one profile per user.
            $table->string('full_name');
            $table->string('father_name');
            $table->date('dob');
            $table->string('id_number'); // BRN or NID.
            $table->string('mobile');
            $table->string('profile_picture')->nullable();
            $table->json('education')->nullable(); // JSON for qualifications: SSC, HSC, Honours, Masters.
            $table->string('nationality');
            $table->string('religion');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('blood_group')->nullable();
            $table->text('present_address');
            $table->text('permanent_address');
            $table->enum('status', ['pending', 'active'])->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_profiles');
    }
}
