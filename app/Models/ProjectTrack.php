<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTrack extends Model
{
    use HasFactory;

    protected $table = 'prj_project_track';
    protected $primaryKey = 'PROJECT_TRACK_ID';
    protected $keyType = 'string';

    protected $fillable = [
        'PROJECT_TRACK_ID ',
        'PROJECT_ID',
        'STATUS',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestapm = false;

    public function project()
    {
        return $this->belongsTo(ProjectDetial::class, '
        ', 'DETAIL_ID');
    }
}
