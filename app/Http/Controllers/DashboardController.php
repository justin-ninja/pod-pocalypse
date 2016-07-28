<?php

namespace App\Http\Controllers;

use App\Community;
use App\Services\PodRepo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(PodRepo $podRepo)
    {
        if(Auth::user())
        {
            $availablePods = $podRepo->findUsersCommunityPods();
        }
        if(Auth::guest())
        {
            $availablePods = $podRepo->getAllPods() ;
            $community = Community::whereId(1)->first();
        }
        return view('welcome', compact('availablePods'));
    }
}
