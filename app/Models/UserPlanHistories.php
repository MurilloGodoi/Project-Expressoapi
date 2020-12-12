<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlanHistories extends Model
{
    use HasFactory;

    protected $table = 'user_plan_histories';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'DtStart',
        'DtEnd'
    ];

    public  function user()
    {
        return $this->belongsTo(User::class,'UserId');
    }

    public  function plan()
    {
        return $this->belongsToMany(Plan::class,'PlanId');
    }
}
