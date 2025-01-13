<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    use HasFactory;
    protected $fillable = ['title','description', 'image', 'price', 'discount', 'pdf','purchase', 'category_id'];

}
