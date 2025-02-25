<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function formulas()
    {
        return $this->hasMany(Formula::class);
    }
    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }
}
