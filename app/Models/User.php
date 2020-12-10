<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'Email',
        'Password',
        'AccsessToken',
        'Document',
        'Name',
        'Phone'
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
        return $this->hasOne(UserApi::class,'userid');
    }

    public  function userconfiguration()
    {
        return $this->hasOne(UserConfiguration::class,'userid');
    }

    public  function userplanhistory()
    {
        return $this->hasOne(UserConfiguration::class);
    }

    public function userplan()
    {
        return $this->hasOne(UserPlan::class,'userid');
    }

    public function userapirequest()
    {
        return $this->hasOne(UserApiRequest::class);
    }
}
