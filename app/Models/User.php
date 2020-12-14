<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'email',
        'password',
        'accsessToken',
        'document',
        'name',
        'phone'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public  function userapi()
    {
        return $this->hasOne(UserApi::class,'userId');
    }

    public  function userconfiguration()
    {
        return $this->hasOne(UserConfiguration::class,'userId');
    }

    public  function userplanhistory()
    {
        return $this->hasMany(UserPlanHistories::class, 'UserId');
    }

    public function userplan()
    {
        return $this->hasOne(UserPlan::class,'userId', );
    }

    public function userapirequest()
    {
        return $this->hasMany(UserApiRequest::class, 'userId');
    }
}
