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
}
