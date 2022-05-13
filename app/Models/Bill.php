<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public $timestamps = false;

    protected $table='bill';

    protected $fillable = [
        'order_id',
        'desk_id',
        'user_id', 
        'time_in',
        'time_out',
    ];
}
