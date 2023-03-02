<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTeam extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'prj_project_team';
    protected $fillable = [
        'DETAIL_ID',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function project()
    {
        return $this->belongsTo(ProjectDetial::class, 'DETAIL_ID', 'DETAIL_ID');
    }
}
