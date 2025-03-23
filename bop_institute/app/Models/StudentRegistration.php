<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    protected $fillable = ['user_id', 'status', 'remarks'];

    public function studentProfile()
    {
        // Assuming the StudentProfile has a user_id that matches this registration's user_id.
        return $this->hasOne(StudentProfile::class, 'user_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
