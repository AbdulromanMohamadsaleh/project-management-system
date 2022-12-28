<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = 'prj_project_login';
    protected $fillable = [
        'LOGIN_ID',
        'NAME',
        'EMAIL',
        'NICKNAME',
        'CARD_ID',
        'TELEPHONE',
        'AGENCY',
        'POSITION',
    ];
}
