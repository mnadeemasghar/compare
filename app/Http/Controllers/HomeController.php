<?php

namespace App\Http\Controllers;

use App\Models\DarazLink;
use App\Models\Group;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'Admin'){
            return redirect()->route('admin.dashboard');
        }else{
            $user_id = Auth::user()->id;

            $groups = Group::with('darazlink')->where('user_id',$user_id)->get();

            return view('user.dashboard')->with('groups',$groups);
        }
    }

    public function link(Request $request){
        if(Auth::user()->role == 'Admin'){
            return redirect()->route('admin.dashboard');
        }
        else{
            $darazlink = DarazLink::where('url',$request->link)->get();
            return view('user.link_detail')->with('details',$darazlink);
        }
    }
}
