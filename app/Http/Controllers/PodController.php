<?php

namespace App\Http\Controllers;

use App\Pod;
use App\PodType;
use App\Services\ImageFactory;
use App\Services\PodRepo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PodController extends Controller
{
    protected $podRepo;
    
    function __construct(PodRepo $podRepo)
    {
        $this->podRepo = $podRepo;
    }

    public function podTypeCreate(Request $request, ImageFactory $imageFactory)
    {
        if($request->hasFile('pod_type_image')) {
            $fileName = time();
            $image = $imageFactory->podTypeImageSetup($request->file('pod_type_image'), $fileName);

            $request['image'] = $image;
        }

        PodType::create($request->all());
        return redirect()->back();
    }

    public function podCreate(Request $request)
    {
//        return $request->all();
        $request['community_id'] = Auth::user()->community->id;
        $pod = Pod::create($request->all());
        if($request['remove_from_kitty'])
        {
            $removeAmount = $pod->cost_each * $pod->qty;
            Auth::user()->community()->update(['kitty' => Auth::user()->community->kitty - $removeAmount]);
        }
        return redirect()->back();
    }
    
    public function podUpdate(Pod $pod, Request $request)
    {
        $pod->update($request->all());
        return redirect()->back();
    }

    public function podBuy(Pod $pod)
    {
        $pod->update(['qty' => $pod->qty - 1]);
        Auth::user()->account()->update(['amount' => Auth::user()->account->amount - $pod->price_each]);
        Auth::user()->pods()->attach($pod->id);
        return redirect()->back();
    }
}
