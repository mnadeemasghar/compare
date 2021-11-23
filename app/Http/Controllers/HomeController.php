<?php

namespace App\Http\Controllers;

use App\Models\DarazLink;
use App\Models\Group;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
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

            $groups = Group::where('user_id',$user_id)->get();
            foreach($groups as $group){
                $group->category = DarazLink::where('product_link',$group->url)->value('main_category');
            }

            $categories = DarazLink::pluck('main_category')->toarray();
            foreach($categories as $category){
                $product_links[$category] = DarazLink::where('main_category',$category)->pluck('product_link')->toarray();
                foreach($product_links[$category] as $product_link){
                    $reviews[$product_link] = DarazLink::where('product_link',$product_link)->get()->max('product_rating_total');
                }
            }

            $links = DarazLink::get()->groupBy('product_link');

            // dd($categories, $product_links, $reviews,$links);
            return view('user.dashboard')->with('groups',$groups);
        }
        
    }
}
