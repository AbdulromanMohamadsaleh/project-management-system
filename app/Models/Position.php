<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'prj_position';
    protected $primaryKey = 'POS_ID';
    protected $keyType = 'string';
    public $timestapm = false;
}
