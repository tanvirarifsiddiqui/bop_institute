<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'formula_id', 'receipt_pdf'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formula()
    {
        return $this->belongsTo(Formula::class);
    }
    
}
