<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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

            $groups['data'] = Group::where('user_id',$user_id)->get();
            $groups['history'] = Group::where('user_id',$user_id)
                                    ->join('darazlink','darazlink.product_link','groups.url')
                                    ->orderby('darazlink.created_at','desc')
                                    ->get();

            return view('user.home')->with('groups',$groups);
        }
        
    }
}
