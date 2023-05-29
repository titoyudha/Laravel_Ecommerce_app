<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password'
    ];


    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $cast = [
        'email_verified_at' => 'datetime'
    ];
}
