<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'community_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function community()
    {
        return $this->belongsTo('App\Community');
    }

    public function role()
    {
        return $this->belongsTo('App\Roles');
    }

    public function account()
    {
        return $this->hasOne('App\UserAcount');
    }

    public function pods()
    {
        return $this->belongsToMany('App\Pod')->withTimestamps();
    }
}
