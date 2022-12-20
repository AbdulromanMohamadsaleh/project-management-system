<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTeam extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'prj_teamname';
    protected $fillable = [
        'ID_NAME',
        'RELATED_NAME',
        'DETAIL_ID',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
