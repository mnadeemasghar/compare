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
        $link = 'test.html';

        $html =  htmlentities(file_get_contents($url));
        $apprun_position = strpos($html,'app.run');
        $apprun_position = $apprun_position + 8;
        $endofapprun_position = strpos(
            substr($html,$apprun_position), "]}}}"
        );
        $string = substr($html, $apprun_position, $endofapprun_position+4);
        //convert into html decoded
        $apprun_string = html_entity_decode($string);
        
        //convert into string to array
        $data_array = json_decode($apprun_string, TRUE);
        
        //$apprun_string = preg_replace('@<(\w+)\b.*?'>'.*?</\1>@si', '', $apprun_string);
        $apprun_string = str_replace("<a", " ", $apprun_string);
        $apprun_string = str_replace('</a>', " ", $apprun_string);
        $apprun_string = strip_tags($apprun_string);
        $apprun_string = str_replace(">", " ", $apprun_string);
        
        // die($apprun_string);
        

        // dd($data_array);
        $data['page_body'] = $html;

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

            $data['product_skus'] = $data_array['data']['root']['fields']['skuInfos'];

        }
        return $data;
    }
}
