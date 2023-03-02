<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'prj_project_login';
    protected $primaryKey = 'LOGIN_ID';
    protected $keyType = 'string';

    protected $fillable = [
        'LOGIN_ID',
        'NAME',
        'EMAIL',
        'NICKNAME',
        'CARD_ID',
        'TELEPHONE',
        'AGENCY',
        'POSITION',
        'password'
    ];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     // 'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function projects()
    {
        return $this->belongsToMany(
            ProjectDetial::class,
            'prj_project_team',
            'LOGIN_ID',
            'DETAIL_ID'
        );
    }


    public function getPOSITIONAttribute($val)
    {
        // dd($val);
        switch ($val) {
            case 0:
                return 'Employee';
            case 1:
                return 'Admin';
            case 2:
                return 'Project Manager';
            case 3:
                return 'Manager';
            default:
                return 'Employee';
        }
    }


    public function setPOSITIONAttribute($val)
    {
        if ($val == 'Employee')
            $val = 0;
        else if ($val == 'Admin')
            $val = 1;
        else if ($val == 'Project Manager')
            $val = 2;
        else if ($val == 'Manager')
            $val = 3;
        else
            $val = 0;

        $this->attributes['POSITION'] = $val;
    }
}
