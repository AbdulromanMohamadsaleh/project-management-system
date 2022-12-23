<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    use HasFactory;

    protected $table = 'prj_activity_task';
    protected $fillable = [
        'TASK_ID',
        'TASK_NAME',
        'ACTIVITY_ID',
        'DAY',
        'STATUS',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestapm = false;

    public function project()
    {
        return $this->belongsTo(ProjectActivity::class, 'ACTIVITY_ID', 'ACTIVITY_ID');
    }
}
