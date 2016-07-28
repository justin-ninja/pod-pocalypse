<?php

namespace App\Http\Controllers;

use App\Community;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function pay(User $user, Request $request)
    {
        $adding = $request->only('amount');
        $user->account()->update(['amount' => $adding['amount']+Auth::user()->account->amount]);
        $user->community()->update(['kitty' => $adding['amount']+Auth::user()->community->kitty]);
        return redirect()->back();
    }
}
