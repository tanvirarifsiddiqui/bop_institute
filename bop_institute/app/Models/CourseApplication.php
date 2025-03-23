<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseApplication extends Model
{
    protected $fillable = ['student_profile_id', 'course_id', 'status', 'remarks'];

    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
