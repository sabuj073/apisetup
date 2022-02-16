<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDays extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'day_number',
        'hour',
        'time',
        'date',
    ];
}
