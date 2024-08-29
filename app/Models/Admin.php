<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory , HasFactory, Notifiable;

    protected $guard='admin';

     protected $fillable = [
        'email',
        'phone',
        'password',
        'first_name',
        'last_name',
        'type',
        'status',
    ];

     protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}