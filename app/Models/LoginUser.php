<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginUser extends Model
{
    use HasFactory;
    protected $table = 'prj_project_login';

    public function Project()
    {
        return $this->belongstoMany(ProjectDetial::class, 'prj_project_team', 'LOGIN_ID', 'DETAIL_ID', 'LOGIN_ID', 'DETAIL_ID');
    }

    

}
