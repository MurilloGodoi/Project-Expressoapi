<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;

    protected $table = 'user_plans';
    protected $primaryKey = 'userId';
    public $timestamps = false;
    protected $fillable = [
        'SMSCredits',
        'planId'
    ];

    public  function user()
    {
        return $this->belongsTo(User::class,'userId');
    }

    public  function plan()
    {
        return $this->belongsTo(Plan::class,'planId');
    }
}
