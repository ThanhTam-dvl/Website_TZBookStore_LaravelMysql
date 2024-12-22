<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    public $timestamps = false;
    protected $fillable = [
        'username', 
        'email', 
        'password', 
        'full_name', 
        'gender', 
        'birth_date', 
        'phone', 
        'address', 
        'role', 
        'is_active'
    ];

    protected $hidden = [
        'password',
    ];
}
