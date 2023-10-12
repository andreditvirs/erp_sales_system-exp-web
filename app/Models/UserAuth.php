<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserAuth extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $username = 'username';

    protected $hidden = [

    ];
}
