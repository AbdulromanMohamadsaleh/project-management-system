<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedTask extends Model
{
    use HasFactory;

    protected $table = 'prj_assigned_task';
    protected $primaryKey = 'ASSIGNED_ID';
    protected $keyType = 'string';

    public $timestapm = false;

    public function user()
    {
        return $this->belongsto(User::class, 'LOGIN_ID', 'LOGIN_ID');
    }

    public function taask()
    {
        return $this->belongsto(ProjectTask::class, 'TASK_ID', 'TASK_ID');
    }
}
