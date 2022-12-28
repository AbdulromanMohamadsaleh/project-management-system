<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetial extends Model
{
    use HasFactory;
    protected $table = 'prj_detail';
    protected $primaryKey = 'DETAIL_ID';
    protected $keyType = 'string';
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
        'IS_APPROVE',
        'PROJECT_MANAGER'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestapm = false;



    // public function tasks()
    // {
    //     return $this->hasManyThrough(ProjectTask::class, ProjectActivity::class, 'DETAIL_ID', 'ACTIVITY_ID');
    // }
    public function projectTeam()
    {
        return $this->belongstoMany(LoginUser::class, 'prj_project_team', 'DETAIL_ID', 'LOGIN_ID', 'DETAIL_ID', 'LOGIN_ID');
    }

    public function activity()
    {
        return $this->hasMany(ProjectActivity::class, 'DETAIL_ID', 'DETAIL_ID');
    }

    public function ProjectManager()
    {
        return $this->belongsto(LoginUser::class, 'PROJECT_MANAGER', 'LOGIN_ID');
    }
}
