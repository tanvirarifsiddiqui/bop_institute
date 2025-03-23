<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = ['name', 'start_date'];

    public function course()
    {
        return $this->morphOne(Course::class, 'courseable');
    }
}
