<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'PROJECT_MANAGER',
        'created_at',
        'PROJECT_PERCENTAGE',
        'APPROVED_BY'
    ];

    protected $hidden = [
        'updated_at',
    ];

    public $timestapm = false;


    public function projectTeam()
    {
        return $this->belongstoMany(User::class, 'prj_project_team', 'DETAIL_ID', 'LOGIN_ID', 'DETAIL_ID', 'LOGIN_ID');
    }

    public function activity()
    {
        return $this->hasMany(ProjectActivity::class, 'DETAIL_ID', 'DETAIL_ID');
    }

    public function ProjectManager()
    {
        return $this->belongsto(User::class, 'PROJECT_MANAGER', 'LOGIN_ID');
    }

    public function Category()
    {
        return $this->belongsto(Category::class, 'CATEGORY_ID', 'CATEGORY_ID');
    }

    public function ProjectCreator()
    {
        return $this->belongsto(User::class, 'RECORD_CREATOR', 'LOGIN_ID');
    }

    public function Approver()
    {
        return $this->belongsto(User::class, 'APPROVED_BY', 'LOGIN_ID');
    }

    public function tasks()
    {
        return $this->hasManyThrough(
            ProjectTask::class,
            ProjectActivity::class,
            'DETAIL_ID', // Foreign key on ProjectActivity table...
            'ACTIVITY_ID', // Foreign key on tasks table...
            'DETAIL_ID', // Local key on countries table...
            'ACTIVITY_ID' // Local key on ProjectActivity table...
        );
    }
}
