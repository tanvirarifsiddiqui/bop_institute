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
}
