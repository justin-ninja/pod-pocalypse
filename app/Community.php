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

    public function pods()
    {
        return $this->hasMany('App\Pod');
    }

    public function availablePods()
    {
        return $this->hasMany('App\Pod')->where('qty', '>', 0);
    }


}
