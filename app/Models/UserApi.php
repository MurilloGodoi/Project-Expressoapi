<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApi extends Model
{
    use HasFactory;

    protected $table = 'userapi';
    protected $primaryKey = 'ApiId';
    public $timestamps = false;
    protected $fillable = [
        'Username',
        'Password',
        'userId'

    ];

    public  function user()
    {
        return $this->belongsTo(User::class,'userId');
    }

    public  function api()
    {
        return $this->belongsTo(Api::class,'ApiId');
    }
}
