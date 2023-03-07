<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    use HasFactory;

    protected $table = 'prj_activity_task';
    protected $primaryKey = 'TASK_ID';
    protected $keyType = 'string';

    protected $fillable = [
        'TASK_ID',
        'TASK_NAME',
        'ACTIVITY_ID',
        'DAY',
        'STATUS',
        'COMPLETED_BY',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestapm = false;

    public function activity()
    {
        return $this->belongsTo(ProjectActivity::class, 'ACTIVITY_ID', 'ACTIVITY_ID');
    }

    public function CompleteBy()
    {
        return $this->belongsto(User::class, 'COMPLETED_BY', 'LOGIN_ID');
    }

    // public function assignedUser()
    // {
    //     return $this->hasMany(AssignedTask::class, 'TASK_ID', 'TASK_ID');
    // }

    public function assignedUser()
    {
        return $this->belongstoMany(User::class, AssignedTask::class, 'TASK_ID', 'LOGIN_ID', 'TASK_ID', 'LOGIN_ID');
    }
}
