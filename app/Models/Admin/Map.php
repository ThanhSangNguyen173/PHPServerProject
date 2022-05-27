<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    public $timestamps = false;

    protected $table='map';

    protected $fillable = [
        'urlToImage',
        'title', 
        'description',
        'activeTime',
        'distance',
    ];
}
