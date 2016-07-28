<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAcount extends Model
{
    protected $fillable = [
        'user_id', 'account'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
