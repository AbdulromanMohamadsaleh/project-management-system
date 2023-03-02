<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectActivity extends Model
{
    use HasFactory;
    protected $table = 'prj_project_activity';
    protected $primaryKey = 'ACTIVITY_ID';
    protected $keyType = 'string';

    protected $fillable = [
        'ACTIVITY_ID',
    ];

    public function tasks()
    {
        return $this->hasMany(ProjectTask::class, 'ACTIVITY_ID', 'ACTIVITY_ID');
    }
}
