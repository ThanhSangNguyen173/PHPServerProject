<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'table';

    public $timestamps = false;

    protected $fillalble = [
        'serial_tagcast_id',
        'status',
    ];
}
