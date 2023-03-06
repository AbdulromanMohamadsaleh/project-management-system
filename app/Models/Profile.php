<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'prj_profile';
    protected $primaryKey = 'PROF_ID';
    protected $keyType = 'string';


    public function Position()
    {
        return $this->belongsto(Position::class, 'POS_ID', 'POS_ID');
    }
}
