<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['course_type_id', 'name', 'description'];

    public function courseType()
    {
        return $this->belongsTo(CourseType::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
