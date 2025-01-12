<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'price', 'discount', 'pdf', 'category_id'];

}
