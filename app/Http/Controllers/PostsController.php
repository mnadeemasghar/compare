<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = DB::table('posts')->orderByDesc('updated_at')->cursorPaginate(5);
        return view('admin.post.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.post.create');
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
        $post = new posts;
        $post->title = $request->title;
        $post->body = $request->body;

        if($post->save()){
            return redirect()->back()->with('message', "New Created");
        }
        else{
            return redirect()->back()->with('message', "Somthing went wrong");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(posts $posts)
    {
        //
        return view('admin.post.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $post = posts::find($request->id);
        return view('admin.post.create')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;
        $post = posts::find($id);
        $post->title = $request->title;
        $post->body = $request->body;

        if($post->save()){
            return redirect()->route('posts');
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        if(posts::find($request->id)->delete()){
            return redirect()->back()->with('message', "Post Deleted");
        }
        else{
            return redirect()->back()->with('message', "Something Went Wrong");
        }
    }
}
