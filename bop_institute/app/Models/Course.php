<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_code',
        'program_id',
        'name',
        'course_fee',
        'duration',
        'mode',
        'apply_option',
        'courseable_id',
        'courseable_type'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function courseable()
    {
        return $this->morphTo();
    }

    // Relationship to access enrollments for this course.
    public function enrollments()
    {
        return $this->hasMany(\App\Models\Enrollment::class, 'course_id', 'id');
    }

    // Relationship to directly access enrolled students via enrollments
    public function students()
    {
        return $this->hasManyThrough(
            \App\Models\StudentProfile::class,
            \App\Models\Enrollment::class,
            'course_id',          // Foreign key on Enrollment table...
            'id',                 // Foreign key on StudentProfile table (assuming primary key is `id`)
            'id',                 // Local key on Course table...
            'student_profile_id'  // Local key on Enrollment table linking to StudentProfile
        );
    }
}
