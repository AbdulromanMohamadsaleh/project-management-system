<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'prj_category';
    protected $fillable = [
        'CATEGORY_ID',
        'NAME_CATEGORY',
    ];


    public $timestapm = false;
}
