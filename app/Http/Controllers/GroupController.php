<?php

namespace App\Http\Controllers;

use App\Models\DarazLink;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_id = Auth::user()->id;
        $url = $request->url;
        $darazlink_id = DarazLink::where('url',$url)->first()->value('id');

        $url_check = Group::where('daraz_link_id',$darazlink_id)->where('user_id',$user_id)->get();
        if(isset($url_check) && $url_check->count() > 0 ){
            return redirect()->back()->with('message',"URL already listed");
        }
        else{
            $group_name = $request->group_name;

            $new = new Group;
            $new->user_id = $user_id;
            $new->group_name = $group_name;
            $new->daraz_link_id = $darazlink_id;
    
            if($new->save()){
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $user_id = Auth::user()->id;
        if(Group::where('id',$request->id)->where('user_id',$user_id)->delete()){
            return redirect()->back()->with('message',"Link Deleted Successfully!");
        }
        else{
            return redirect()->back()->with('message',"Could not Delete!");
        }
    }
}
