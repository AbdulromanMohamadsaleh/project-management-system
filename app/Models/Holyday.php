<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holyday extends Model
{
    use HasFactory;
    protected $table = 'prj_holyday_date';
    protected $fillable = [
        'HOLYDAY_ID',
        'HOLYDAY_NAME',
        'HOLYDAY_DATE',
    ];


    public $timestapm = false;

}


