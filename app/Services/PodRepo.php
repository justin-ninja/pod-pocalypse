<?php
/**
 * Created by PhpStorm.
 * User: justinsmith
 * Date: 2016/07/28
 * Time: 9:48 PM
 */

namespace App\Services;


use App\Pod;
use App\PodType;
use Illuminate\Support\Facades\Auth;

class PodRepo
{
    protected $pod;
    protected $podType;

    function __construct(Pod $pod, PodType $podType)
    {
        $this->pod = $pod;
        $this->podType = $podType;
    }
    public function getAllPods()
    {
        return $this->pod->where('qty', '>', 0)->get();
    }

    public function findUsersCommunityPods()
    {
        return $this->pod->whereCommunityId(Auth::user()->community->id)->where('qty', '>', 0)->get();
    }

    public function podTypeList()
    {
        return $this->podType->lists('id', 'name');
    }
}