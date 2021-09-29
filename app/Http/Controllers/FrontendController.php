<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\attribute;
use App\Models\contactus;
use App\Models\DarazLink;
use App\Models\Darazskus;
use App\Models\posts;
use App\Models\price;
use App\Models\sub;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function getdarazdata(Request $request){
        if(isset($request->url)){
            $url = $request->url;
            $parse = parse_url($url);
            $host = $parse['host'];

            
            if($host == "www.daraz.pk" || $host == "daraz.pk"){
                $new = new DarazLink();
                $response = $this->getdata($request->url);
                
                $new->url = $url;
                if(isset($response['product_title'])){$new->product_title = $response['product_title'];}
                if(isset($response['product_link'])){$new->product_link = $response['product_link'];}
                if(isset($response['product_rating'])){$new->product_rating_score = $response['product_rating'];}
                if(isset($response['product_total_rating'])){$new->product_rating_total = $response['product_total_rating'];}
                if(isset($response['seller_name'])){$new->seller_name = $response['seller_name'];}
                if(isset($response['seller_shop_id'])){$new->seller_shop_id = $response['seller_shop_id'];}
                if(isset($response['product_sale_price'])){$new->product_sale_price = $response['product_sale_price'];}
                if(isset($response['product_stock'])){$new->product_stock = $response['product_stock'];}
               
                if($new->save()){
                    if(isset($response['product_title'])){
                        $data['message'] = 'Data Fetched.';

                        //save sku data in darazskus table
                        foreach($response['product_skus'] as $key => $skus){
                            $sku = new Darazskus();
                            $sku->darazlink_id = $new->id;
                            $sku->sku_id = $key;
                            $sku->sku_stock = $skus['stock'];
                            $sku->price = $skus['price']['salePrice']['value'];

                            $sku->save();

                        }
                    }
                    else{
                        $data['message'] = 'Something went Wrong';
                    }

                    $data['response'] = $response;
                }
            }
            else{
                $data['message'] = 'This tool is only for Daraz.pk';
            }
        }
        else{
            $data['message'] = 'Waiting for your link';
        }
        if(isset($response['product_link'])){
            $link = $new->product_link;
            $history = DB::table('darazlink')
                        ->where("product_link",$link)
                        ->select(
                                DB::raw('DATE(created_at) as date '),
                                DB::raw('avg(product_stock) as stock'),
                                DB::raw('avg(product_rating_total) as rating'),
                                DB::raw('avg(product_sale_price) as price'),
                                )
                        ->groupBy('date')
                        ->get();
                        
        }else{
            $history = [];
        }

        return view('frontend.getdarazdata')
                ->with('history',$history)
                ->with('data',$data)
                ->with('url',$request->url);
    }
    public function daraztools(){
        return view('frontend.daraztools');
    }
    public static function getcate(){
        $string = "";
        $cates = DB::table('items-prices')
                ->distinct('category')
                ->get('category');
        $stores = DB::table('items-prices')
                ->distinct('store')
                ->get('store');
        
                foreach($cates as $data){
            $string .= "Compare ".$data->category.", ";
        }
        
        $string .= "which are available on ";

        foreach($stores as $data){
            $string .= $data->store.", ";
        }
        return $string;
    }
    //
    public function url_detail(Request $request){
        $validator = Validator::make(
            $request->all(),[
            'url' => 'required|string|url',
        ]);
        if ($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            $response_array = array('status' => false,  'message' => $error_messages);
            return response()->json(
                $response_array
            );
        }
        else{
            $data = DB::table('items-prices')->where('url', $request->url)->get();
            $name = DB::table('items-prices')->distinct('name')->where('url', $request->url)->value('name');
        return view('url_detail')->with('data',$data)->with('name', $name)->with('url',$request->url);
        }
    }
    public function submail(Request $request){
        if(sub::where('email',$request->submail)->get()->count()>0){
            return redirect()->back()->with('message',"You are already subscribed");
        }
        $sub = new sub;
        $sub->email = $request->submail;
        $sub->active = 1;

        if($sub->save()){
            return redirect()->back()->with('message',"Subscription Successful");
        }
        else{
            return redirect()->back()->with('message',"Something Went wrong, Please try again.");
        }
    }
    public function aboutus(){
        return view('frontend.aboutus');
    }
    public function welcome(){
        return view('welcome');
    }
    
    public function search(Request $request){
        if(!isset($request->search)){
            return view('welcome');
        }
        $validator = Validator::make(
            $request->all(),[
            'search' => 'required|string',
        ]);
        if ($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            $response_array = array('status' => false,  'message' => $error_messages);
            return response()->json(
                $response_array
            );
        }
        else{
            $min_price = 0;
            $max_price = 10000000000000;
            $filter = [];
            if(isset($request->category) && $request->category != "" && $request->category != null ){
                $filter['category'] = $request->category;
            }
            if(isset($request->store) && $request->store != "" && $request->store != null ){
                $filter['store'] = $request->store;
            }
            if(isset($request->minprice) && $request->minprice != "" && $request->minprice != null ){
                $min_price = $request->minprice;
            }
            if(isset($request->maxprice) && $request->maxprice != "" && $request->maxprice != null ){
                $max_price = $request->maxprice;
            }
            // dd($min_price,$max_price);
            $searchitems = DB::table('items-prices')
                            ->select([
                                'items-prices.name',
                                'items-prices.category',
                                'items-prices.price',
                                'items-prices.url as count_url',
                                DB::raw('(SELECT count(*) FROM `items-prices` WHERE `items-prices`.`url` = `count_url`) as count'),
                                DB::raw('(SELECT max(created_at) FROM `items-prices` WHERE `items-prices`.`url` = `count_url`) as latest_date'),
                                DB::raw('(SELECT `price` FROM `items-prices` WHERE `items-prices`.`url` = `count_url` ORDER BY `created_at` DESC LIMIT 1) as latest_price'),
                            ])
                            ->distinct('items-prices.url')
                            ->where('items-prices.name','like','%'.$request->search.'%')
                            ->whereBetween('items-prices.price', [$min_price, $max_price])
                            ->where($filter)
                            ->paginate(5);
                // dd($searchitems);
            $counts = DB::table('items-prices')
                            ->select([
                                'items-prices.name',
                                'items-prices.category',
                                'items-prices.url as count_url',
                                DB::raw('(SELECT count(*) FROM `items-prices` WHERE `items-prices`.`url` = `count_url`) as count'),
                                DB::raw('(SELECT max(created_at) FROM `items-prices` WHERE `items-prices`.`url` = `count_url`) as latest_date'),
                                DB::raw('(SELECT `price` FROM `items-prices` WHERE `items-prices`.`url` = `count_url` ORDER BY `created_at` DESC LIMIT 1) as latest_price'),
                            ])
                            ->distinct('items-prices.url')
                            ->whereBetween('items-prices.price', [$min_price, $max_price])
                            ->where('name','like','%'.$request->search.'%')
                            ->where($filter)
                            ->count();

            $categories = DB::table('items-prices')
                            ->distinct('category')
                            ->get('category');

            $stores = DB::table('items-prices')
                            ->distinct('store')
                            ->get('store');

            return view('welcome')
                ->with('request',$request->all())
                ->with('counts', $counts)
                ->with('categories',$categories)
                ->with('stores',$stores)
                ->with('searchitems', $searchitems);
        }
    }

    public function update_item_id(){
        $items = item::all()->where('description','!=', "0");
        // dd($items);
        foreach($items as $item){
            // $attrs = Attribute::where('objectid',$item->description)->where('item_id', 0)->get();
            $attrs = Attribute::where('objectid',$item->description)->update(['item_id' => $item->id]);
            // foreach($attrs as $attr){
                //     $attr->item_id = $item->id;
                //     $attr->save();
                // }
            $item->description = "0";
            $item->save();
        }
        echo "done";
    }

    public function contactus(){
        return view('frontend.contactus');
    }
    
    public function submitContactUs(Request $request){
      
            $msg = new contactus;
            $msg->name = $request->name;
            $msg->email = $request->email;
            $msg->phone = $request->phone;
            $msg->message = $request->message;
    
            if($msg->save()){
                return redirect()->back()->with('message', "Thanks for your interest.");
            }
    }

    public function sitemap(){
        $data = item::join('items-prices', 'items-prices.item_id','items.id')->distinct()->get([
            'items.*'
        ]);
        return view('frontend.sitemap')->with('items',$data);
    }

    public function blog(){
        $posts = DB::table('posts')->orderByDesc('updated_at')->Paginate(2);
        return view('frontend.blog')->with('posts',$posts);
    }
}
