<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\attribute;
use App\Models\price;

class ItemController extends Controller
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
        $data = item::all();
        return view('item.index')->with('items', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('item.create');
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
        if($request->name == "" || $request->description == ""){
            return "Please add complete information";
        }
        $item = new Item;
        $item->name = $request->name;
        $item->description = $request->description;

        if($item->save()){
            return "<strong>New Item Saved</strong><br>
            Item: ".$item->name."<br>".
            "Descrtiption: ".$item->description;
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
        $data = Item::find($id);
        return view('item.show')->with('item' , $data);
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
        $id = $request->id;
        $del_item = Item::find($id);
        $del_attr = Attribute::where('item_id', $id);
        $del_price = Price::where('item_id', $id);
        if($del_item->delete() || $del_attr->delete() || $del_price->delete()){
            return redirect()->route('items');
        }
    }
}
