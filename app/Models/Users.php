<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Users as Authenticatable;

class Users extends Model
{
    use HasApiTokens,HasFactory;
    protected $table='users';
    
    protected $fillable = [
        'full_name',
        'username',
        'password',
        'email',
        'DOB',
    ];

}
