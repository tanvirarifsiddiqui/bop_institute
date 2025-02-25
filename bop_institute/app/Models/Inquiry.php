<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'formula_id',
        'name',
        'email',
        'category_id',
        'message',
        'reply',
        'approved',
    ];

    // Relationships
    public function formula()
    {
        return $this->belongsTo(Formula::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

