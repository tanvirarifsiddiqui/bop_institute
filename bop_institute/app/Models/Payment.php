<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'formula_id',
        'payment_id',
        'trx_id',
        'transaction_status',
        'amount',
        'currency',
        'payment_execute_time',
        'payer_reference',
    ];

}
