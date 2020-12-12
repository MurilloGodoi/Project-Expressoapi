<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plans';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'Name',
        'Requests',
        'Price'
    ];

    public  function userplanhistories()
    {
        return $this->hasMany(UserPlanHistories::class,'PlanId');
    }

    public  function userplan()
    {
        return $this->hasMany(UserPlan::class,'planId');
    }
}
