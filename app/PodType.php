<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PodType extends Model
{
    protected $fillable = [
        'name', 'image'
    ];

    public function pods()
    {
        return $this->hasMany('App\Pod');
    }
}
