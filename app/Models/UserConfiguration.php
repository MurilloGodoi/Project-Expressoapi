<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserConfiguration extends Model
{
    use HasFactory;

    protected $table = 'user_configurations';
    protected $primaryKey = 'userId';
    public $timestamps = false;
    protected $fillable = [
        'SMTPUsername',
        'SMTPHost',
        'SMTPPassword',
        'SMTPPort',
        'TrackingEmailTemplate',
        'TrackingEmailEventTemplate'
    ];

    public  function user()
    {
        return $this->belongsTo(User::class,'userId');
    }
}
