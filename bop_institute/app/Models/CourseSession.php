<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSession extends Model
{
    protected $fillable = ['name'];

    public function course()
    {
        return $this->morphOne(Course::class, 'courseable');
    }
}
