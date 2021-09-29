<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\attribute;
use App\Models\Item;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function show_unique_attributes(){
        $return = '';
            $attribute_data = Attribute::select('name')->distinct()->get();
            foreach($attribute_data as $data){
                $return .= "<option>
                <td>".$data->name."</td>";
            }
            return $return;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $return = '';
            $attribute_data = Attribute::where('item_id', $request->item_id)->get();
            foreach($attribute_data as $data){
                $return .= "<tr>
                <td>".$data->id."</td>
                <td>".$data->name."</td>
                <td>".$data->description."</td>
                <td> <a class='btn btn-danger' onclick=delAttr(".$data->id.") >Delete</a> </td>
                </tr>";
            }
            return $return;
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
        if($request->name == "" || $request->description == "" || $request->item_id == ""){
            return "Please add complete information";
        }
        $attribute = new Attribute;
        $attribute->name = $request->name;
        $attribute->description = $request->description;
        $attribute->item_id = $request->item_id;

        if($attribute->save()){
            $return = '';
            $attribute_data = Attribute::where('item_id', $request->item_id)->get();
            foreach($attribute_data as $data){
                $return .= "<tr>
                <td>".$data->id."</td>
                <td>".$data->name."</td>
                <td>".$data->description."</td>
                <td> <a class='btn btn-danger' onclick=delAttr(".$data->id.") >Delete</a> </td>
                </tr>";
            }
            return $return;
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
        $item_id = $request->item_id;
        $attr_id = $request->attr_id;

        $data = Attribute::where('id',$attr_id)->where('item_id', $item_id);
        $data->delete();
    }
}
