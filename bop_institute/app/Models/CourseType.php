<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    protected $fillable = ['name'];

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
