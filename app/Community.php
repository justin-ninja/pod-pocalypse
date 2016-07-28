<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $fillable = [
        'name', 'kitty'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
