<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetial extends Model
{
    use HasFactory;
    protected $table = 'prj_detail';
    protected $fillable = [
        'DETAIL_ID',
        'NAME_PROJECT',
        'REASONS',
        'OBJECTIVE',
        'LOCATION',
        'TARGET',
        'RESULT',
        'DATE_START',
        'DATE_SAVE',
        'RECORD_CREATOR',
        'PROPONEN_NAME',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestapm = false;
}
