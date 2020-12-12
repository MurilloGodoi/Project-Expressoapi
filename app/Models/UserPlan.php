<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;

    protected $table = 'user_plans';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'SMSCredits'
    ];

    public  function user()
    {
        return $this->belongsToMany(User::class,'userId');
    }

    public  function plan()
    {
        return $this->belongsTo(Plan::class,'planId');
    }
}
