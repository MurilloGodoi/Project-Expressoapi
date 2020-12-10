<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;

    protected $table = 'apis';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'Name'
    ];

    public  function user()
    {
        return $this->hasOne(User::class,'userid');
    }
}
