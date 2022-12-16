<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubActivity extends Model
{
    use HasFactory;

    protected $table = 'prj_sub_activity';
    protected $fillable = [
        'SUB_ACTIVITY_ID',
        'NAME_SUB_ACTIVITY',
        'ACTIVITY_ID',
        'DAY',
        'STATUS',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestapm = false;
}
