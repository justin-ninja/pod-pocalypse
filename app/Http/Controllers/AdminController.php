<?php

namespace App\Http\Controllers;

use App\Services\PodRepo;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function dashboard(PodRepo $podRepo)
    {
        $podTypes = $podRepo->podTypeList();
        $availablePods = $podRepo->findUsersCommunityPods();
        return view('admin.dashboard', compact('availablePods', 'podTypes'));
    }
}
