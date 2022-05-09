<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\admin\Counter;
use App\Models\admin\Token;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $counter = Counter::find(auth()->user()->counter_id);
        // checking token for this counter
        $token = Token::where('counter_id', auth()->user()->counter_id)->where('status','open')->first();
        return view('user.dashboard.index',compact('counter','token'));
    }
}
