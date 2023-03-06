<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    use HasFactory;

    protected $table = 'prj_privilege';
    protected $primaryKey = 'PRIV_ID';
    protected $keyType = 'string';
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public $timestapm = false;
}
