<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAcount extends Model
{
    protected $fillable = [
        'user_id', 'amount'
    ];

    public function users()
    {
        return $this->hasOne('App\User');
    }
}
