<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    public $timestamps = false;

    protected $table='order_items';

    protected $fillable = [
        'bill_id',
        'products_id',
        'quantity',
        'total'
    ];
}
