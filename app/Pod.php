<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pod extends Model
{
    protected $fillable = [
        'community_id', 'pod_type_id', 'name', 'cost_each', 'price_each', 'qty'
    ];

    public function community()
    {
        return $this->belongsTo('App\Community');
    }

    public function podType()
    {
        return $this->belongsTo('App\PodType');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
