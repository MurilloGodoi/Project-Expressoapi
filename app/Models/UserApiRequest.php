<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApiRequest extends Model
{
    use HasFactory;

    protected $table = 'user_api_requests';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'userId',
        'planId',
        'DtRequest',
        'Url',
        'Body',
        'ResponseStatus',
        'ResponseBody',
        'PostActions'
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
