<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getdata($url){

        $html =  file_get_contents($url);
        $apprun_position = strpos($html,'app.run');
        $apprun_string = substr($html,$apprun_position + 8);
        $apprun_ending = strpos($apprun_string,"catch");

        $apprun_string = substr($apprun_string, 0, $apprun_ending-14);
        

        //convert into string to array
        $data_array = json_decode($apprun_string, TRUE);

        //save data_array to darazlink table

        // dd(sizeof($data_array['data']['root']['fields']['qna']['items']));

        $data['page_body'] = $html;
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
            $data['sub_sub_category'] = $data_array['data']['root']['fields']['skuInfos']['0']['dataLayer']['pdt_category']['2']; 
            $data['categoryid'] = $data_array['data']['root']['fields']['skuInfos']['0']['categoryId']; 
            $data['qas_no'] = sizeof($data_array['data']['root']['fields']['qna']['items']); 

            
            $data['product_skus'] = $data_array['data']['root']['fields']['skuInfos'];

        }
        return $data;
    }
}
