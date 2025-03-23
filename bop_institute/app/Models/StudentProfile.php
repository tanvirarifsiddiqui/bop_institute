<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'father_name',
        'dob',
        'id_number',
        'mobile',
        'profile_picture',
        'education', // JSON field for SSC, HSC, Honours, Masters, etc.
        'nationality',
        'religion',
        'gender',
        'blood_group',
        'present_address',
        'permanent_address',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(CourseApplication::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
