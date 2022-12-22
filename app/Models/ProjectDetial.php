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
        'IS_APPROVE'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestapm = false;


    public function projectTeam()
    {
        return $this->belongstoMany(LoginUser::class, 'prj_project_team', 'DETAIL_ID', 'LOGIN_ID', 'DETAIL_ID', 'LOGIN_ID');
    }
}
