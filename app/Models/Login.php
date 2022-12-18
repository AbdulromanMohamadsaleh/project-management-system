<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    protected $table = 'prj_login';
    protected $fillable = [
        'ID_LOGIN',
        'NAME',
        'EMAIL',
        'NICKNAME',
        'CARD_ID',
        'TELEPHONE',
        'AGENCY',
    ];
}
