<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

     protected $fillable = [
        'client_id',
        'total_days',
        'total_hours',
        'total_male',
        'total_female',
        'total_amount',
        'paid',
        'due',
        'status',
    ];


}
