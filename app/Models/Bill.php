<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItems;

class Bill extends Model
{
    public $timestamps = false;

    protected $table='bill';

    protected $fillable = [
        'desk_id',
        'user_id', 
        'time_in',
        'time_out',
    ];

    /**
     * Get all of the comments for the Bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'bill_id', 'id');
    }
}
