<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'prj_profile';
    protected $primaryKey = 'PROF_ID';
    protected $keyType = 'string';

    protected $fillable = [
        'LOGIN_ID',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestapms = false;

    public function Position()
    {
        return $this->belongsto(Position::class, 'POS_ID', 'POS_ID');
    }

    public function User()
    {
        return $this->belongsto(User::class, 'LOGIN_ID', 'LOGIN_ID');
    }
}
