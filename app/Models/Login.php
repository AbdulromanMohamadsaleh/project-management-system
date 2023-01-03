<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Login extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;

    protected $table = 'prj_project_login';
    protected $primaryKey = 'LOGIN_ID';
    protected $keyType = 'string';
    protected $fillable = [
        'LOGIN_ID',
        'NAME',
        'EMAIL',
        'NICKNAME',
        'CARD_ID',
        'TELEPHONE',
        'AGENCY',
        'POSITION',
        'ROLE',
        'PASSWORD'
    ];
}
