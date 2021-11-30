<?php

namespace App\Http\Controllers;

use App\Models\DarazLink;
use App\Models\Darazskus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getdata($url){

        $old_data = DarazLink::where('url',$url)->whereDate('created_at', Carbon::today())->first();
        // dd($old_data);
        if($old_data && $old_data->count() > 0){
            return $old_data;
        }else{
            $html =  file_get_contents($url);
            $apprun_position = strpos($html,'app.run');
            $apprun_string = substr($html,$apprun_position + 8);
            $apprun_ending = strpos($apprun_string,"catch");
            $apprun_string = substr($apprun_string, 0, $apprun_ending-14);
            $data_array = json_decode($apprun_string, TRUE);
            $data['response'] = $apprun_string;
            if($data_array != null){
                $data['product_title'] = $data_array['data']['root']['fields']['product']['title'];
                $data['product_link'] = $data_array['data']['root']['fields']['product']['link'];
                $data['brand'] = $data_array['data']['root']['fields']['product']['brand']['name'];
                $data['product_rating'] = $data_array['data']['root']['fields']['product']['rating']['score']; 
                $data['product_total_rating'] = $data_array['data']['root']['fields']['product']['rating']['total']; 
                
                $data['seller_name'] = $data_array['data']['root']['fields']['seller']['name']; 
                $data['seller_shop_id'] = $data_array['data']['root']['fields']['seller']['shopId']; 
                $data['product_sale_price'] = $data_array['data']['root']['fields']['skuInfos']['0']['price']['salePrice']['value']; 
                $data['product_stock'] = $data_array['data']['root']['fields']['skuInfos']['0']['stock']; 
                
                $data['main_category'] = $data_array['data']['root']['fields']['skuInfos']['0']['dataLayer']['pdt_category']['0']; 
                $data['sub_category'] = $data_array['data']['root']['fields']['skuInfos']['0']['dataLayer']['pdt_category']['1']; 
                $data['sub_sub_category'] = end($data_array['data']['root']['fields']['skuInfos']['0']['dataLayer']['pdt_category']); 
                $data['categoryid'] = $data_array['data']['root']['fields']['skuInfos']['0']['categoryId'];
                if(isset($data_array['data']['root']['fields']['qna']['items'])){
                    $data['qas_no'] = sizeof($data_array['data']['root']['fields']['qna']['items']);
                }
                
                
                $data['product_skus'] = $data_array['data']['root']['fields']['skuInfos'];
            }
            if(isset($data['product_link'])){
                $product_link = $data['product_link'];
                $old_data = DarazLink::where('product_link',$product_link)->whereDate('created_at', Carbon::today())->get();
                $new = new DarazLink();
                $new->url = $url;
                if(isset($data['product_title'])){$new->product_title = $data['product_title'];}
                if(isset($data['product_link'])){$new->product_link = $data['product_link'];}
                if(isset($data['product_rating'])){$new->product_rating_score = $data['product_rating'];}
                if(isset($data['product_total_rating'])){$new->product_rating_total = $data['product_total_rating'];}
                if(isset($data['seller_name'])){$new->seller_name = $data['seller_name'];}
                if(isset($data['seller_shop_id'])){$new->seller_shop_id = $data['seller_shop_id'];}
                if(isset($data['product_sale_price'])){$new->product_sale_price = $data['product_sale_price'];}
                if(isset($data['product_stock'])){$new->product_stock = $data['product_stock'];}
                
                if(isset($data['main_category'])){$new->main_category = $data['main_category'];}
                if(isset($data['sub_category'])){$new->sub_category = $data['sub_category'];}
                if(isset($data['sub_sub_category'])){$new->sub_sub_category = $data['sub_sub_category'];}
                if(isset($data['categoryid'])){$new->categoryid = $data['categoryid'];}
                if(isset($data['qas_no'])){$new->qas_no = $data['qas_no'];}

                if(isset($data['response'])){$new->response = $data['response'];}
            
                if($new->save()){
                    if(isset($response['product_title'])){
                        
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
                        
                }
            }
            // dd($data['sub_sub_category']);
            return $new;
        }
    }

    public function getdata_api(Request $request){

        $validated = $request->validate([
            'url' => 'required'
        ]);

        $parse = parse_url($request->url);
        $host = $parse['host'];
        
        if($host == "www.daraz.pk" || $host == "daraz.pk"){
            $response = $this->getdata($request->url);
            $data['message'] = 'Data Fetched.';
            $data['response'] = json_decode($response->only('response')['response']);
        }
        else{
            $data['message'] = 'This tool is only for Daraz.pk';
        }

        return $data;
    }
    
    public function getdata_seller(Request $request){

        $validated = $request->validate([
            'url' => 'required'
        ]);

        $parse = parse_url($request->url);
        $host = $parse['host'];
        
        if($host == "www.daraz.pk" || $host == "daraz.pk"){
            $response = $this->getdata($request->url);
            $data['message'] = 'Data Fetched.';
            $data['response'] = json_decode($response->only('response')['response'])->data->root->fields->seller;
        }
        else{
            $data['message'] = 'This tool is only for Daraz.pk';
        }

        return $data;
    }
    
    public function getdata_review(Request $request){

        $validated = $request->validate([
            'url' => 'required'
        ]);

        $parse = parse_url($request->url);
        $host = $parse['host'];
        
        if($host == "www.daraz.pk" || $host == "daraz.pk"){
            $response = $this->getdata($request->url);
            $data['message'] = 'Data Fetched.';
            $data['response'] = json_decode($response->only('response')['response'])->data->root->fields->review;
        }
        else{
            $data['message'] = 'This tool is only for Daraz.pk';
        }

        return $data;
    }

    public function five_day_forcast(Request $request){

        $validated = $request->validate([
            'lat' => 'required',
            'lon' => 'required',
        ]);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://weatherbit-v1-mashape.p.rapidapi.com/forecast/3hourly?lat=".$request->lat."&lon=".$request->lon,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: weatherbit-v1-mashape.p.rapidapi.com",
                "x-rapidapi-key: 147324341bmsh581ce2d9208ea41p1f9f2bjsn08fe8ba9932b"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}
