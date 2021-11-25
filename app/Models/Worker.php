<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Worker extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, MustVerifyEmail, HasFactory, Notifiable;
    protected $fillable = [
        'names',
        'email',
        'phone',
        'national_ID',
        'password',
    ];
}
