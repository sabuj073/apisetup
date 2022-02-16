<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'latitude',
        'longitude',
        'area_name',
        'InTIme',
        'outTIme',
        'status',
    ];
}
