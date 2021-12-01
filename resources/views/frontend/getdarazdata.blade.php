@extends('layouts.app')

@section('content')

<style>
@charset "utf-8" ;
:root{
	--cg-orange:#f39c12;
	--cg-carrot:#e67e22;
	--cg-red:#e74c3c;
	--cg-gray:#95a5a6;
	--cg-blue:#3498db;
	--cg-black:#2f3640;
	--cg-green:#27ae60;
	--cg-bluebell:#3B3B98;
	--cg-theme-color:#333;
}
table[class*='cg-table-'].cg-black{--cg-theme-color:var(--cg-black);}
table[class*='cg-table-'].cg-orange{--cg-theme-color:var(--cg-orange);}
table[class*='cg-table-'].cg-carrot{--cg-theme-color:var(--cg-carrot);}
table[class*='cg-table-'].cg-red{--cg-theme-color:var(--cg-red);}
table[class*='cg-table-'].cg-gray{--cg-theme-color:var(--cg-gray);}
table[class*='cg-table-'].cg-blue{--cg-theme-color:var(--cg-blue);}
table[class*='cg-table-'].cg-green{--cg-theme-color:var(--cg-green);}
table[class*='cg-table-'].cg-bluebell{--cg-theme-color:var(--cg-bluebell);}

[class*='cg-table-']{border-spacing: 0;border-collapse: collapse;background-color: transparent;width: 100%;max-width: 100%;margin-bottom: 20px;border:1px solid #ddd;}
[class*='cg-table-'] thead th,
[class*='cg-table-'] tbody td{padding: 8px;line-height: 1.42857143;vertical-align: top;position: relative;}
[class*='cg-table-'] tbody td{border-bottom: 2px solid #ddd;vertical-align: middle;}
[class*='cg-table-'] thead th{background-color:var(--cg-theme-color);color: #fff; text-align: center; font-weight: bold; font-size: 20px;text-transform: uppercase;}
[class*='cg-table-'] tbody td img{max-height: 150px;margin: 0 auto;max-width: 90%!important;vertical-align: middle!important;transition: all 0.2s;}
[class*='cg-table-'] tbody td .cg-title{text-align: left;color: #000;font-size: 20px;font-weight: 700;line-height: 1.2em;margin: 8px 5px 5px 5px;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;word-break: break-word;}
[class*='cg-table-'] tbody td .cgi_score{color: #000;font-size: 32px;font-weight: 500;padding: 0 12px;text-align: center; line-height: 36px;}
[class*='cg-table-'] tbody td .cgi_score:after{content: "Score";display: block;font-size: 16px;font-weight: normal;background:var(--cg-theme-color);;padding: 2px 6px;color: #fff; line-height: 18px;letter-spacing: 0.8px;}
[class*='cg-table-'] tbody td .cg_rank{font-size: 35px;line-height: 40px;color: #000;font-weight: bold}
[class*='cg-table-'] tbody td .cg-brand{text-align: left;color:var(--cg-theme-color);font-size:18px;font-weight: 500;line-height: 1.1em;margin:0;-webkit-line-clamp:1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;word-break: break-word;}
[class*='cg-table-'] tbody td .cg-button{background-color: #F33B19;border-bottom: 4px solid #B32005;display:inline-block;margin: 0px auto;line-height: 19px;text-decoration: none!important;text-transform: uppercase;color: #fff;font-weight: bold;font-size: 16px;border-radius: 6px;padding: 10px 12px;text-align: center;transition: .2s linear;letter-spacing: 0.2px;white-space: nowrap;}
[class*='cg-table-'] td .cg-button:hover{background-color:#FB9436;box-shadow: rgba(3,3,3,.4) 0 8px 12px 0px; }

.cg-table-one table,td,td{
	border: none;
}
.cg-table-one tbody td .lable:before{display: block;content: ""; background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAdCAMAAACpIX3rAAAAk1BMVEUAAADLZBzUfD3aj1vw18bg3Nn////NbCjLZBzFUgLLZBzQczTLYhnUgEfLZBzPilrXiFHcmWrgpXvZnXHjq4Tdq4jls5DUq43mtZTrw6fcwK7uzbf25NjtyK/25Nny2cj36uH57ub//v33+vv////LZBzMZh7KYBbIWArETgDCSADFUgPHTgDETADJXBDPcC7LVwcCTVnoAAAAJXRSTlMA6OnKWkMU/vb27+zo39XQxbi2s5+blZOGeW9uYmBIQzYoGxsPITPMhgAAAIRJREFUGNNNzEcSgzAQRNEGA84556gZSQjs+5/OLFSa+btXXdXYhyw2mKE01sRGwDpQRAYUlgWfaUMJODgjePQtJWDpFQrHgip3lICtRsmtAPNAgtOPBe+8pgTsvBHc2QrQa0hwrtXyGteUgI1XuHHbQS4Ujn4ieH6HkFZO4WIVqgVU1z8RehVGBQxGTAAAAABJRU5ErkJggg==');height: 24px;width: 10px;position: absolute;top: 100%;left: -3px;}
.cg-table-one tbody td .lable{margin: auto 0 5px -18px;position: relative;text-transform: uppercase;background: #fff;box-shadow: 0 1px 3px rgba(0,0,0,.2);border: 2px solid #FE7900;padding: 4px 10px;color: #000;float: left;font-weight: 700;font-size: 12px!important;word-break:break-word;border-bottom-right-radius: 10px;border-top-left-radius: 10px;display: inline-block;}
.cg-table-one tbody td .lable small{line-height: 1;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;}
.cg-table-one tbody td .cgt-details{margin: 15px 0 0 0;padding:0px;}
.cg-table-one tbody td .cgt-details li{margin:0px;padding: 0 0 5px 0;list-style: none;color:#000; font-size: 16px;font-weight: normal;line-height:19px;    word-break: break-all;}
.cg-table-one tbody td .cgt-details li b{color: #FA5738; font-weight: 600;}
.cg-table-one tbody tr td:nth-child(1){display: none;}
.cg-table-one tbody tr td:nth-child(2){width: 30%;text-align: center;}
.cg-table-one tbody tr td:nth-child(3){width: 25%;}
.cg-table-one tbody tr td:nth-child(4){width: 25%;}
.cg-table-one tbody tr td:nth-child(5){width: 20%;text-align: center;}

.cg-table-two table,td,td{
	border: none;
}
.cg-table-two tbody tr td .cg-button{background-color: #75d35e;border-bottom: 2px solid #64bc46;border-radius: 5px;padding: 12px 16px;text-transform: none; font-weight: normal; font-size: 18px;}
.cg-table-two tbody tr td .cg-button:hover{background: #92e879;border-color: #75d35e;box-shadow: none;}
.cg-table-two tbody tr td{padding: 24px 15px 21px;}
.cg-table-two tbody tr td:nth-child(3){width: 40%;}
.cg-table-two thead tr th{--cg-theme-color:#fff;color: #8b8b88;letter-spacing:0.4px;font-weight:400;font-size:14px;border-bottom:1px solid #ddd;}
.cg-table-two tbody tr td:nth-child(4){width: 15%;}
.cg-table-two tbody tr td:nth-child(1){width: 8%;text-align: center;}
.cg-table-two tbody tr td:nth-child(2){width: 18%;}
.cg-table-two tbody tr td:nth-child(5){text-align: center;}

.cg-table-two .cg_best_value,
.cg-table-two .cg_first_place{position: absolute;top: 10px;left: -1px;background-color: #FFCB2A;color: #fff;font-size: 14px;line-height: 14px;padding:7px 5px 7px 24px;user-select: none;white-space: nowrap;font-weight: 600;box-shadow: 0px 0px 10px -4px rgba(0,0,0,0.5);}
.cg-table-two .cg_best_value:after,
.cg-table-two .cg_first_place:after{content: "";border-left: 8px solid #FFCB2A;border-top:14px solid transparent;border-bottom:14px solid transparent;position: absolute;right: -8px;top: 0;}
.cg-table-two .cg_best_value:before,
.cg-table-two .cg_first_place:before{content: "";background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAUBAMAAACQZWsAAAAAMFBMVEUAAAD///////////////////////////////////////////////////////////87TQQwAAAAD3RSTlMA79+/n0AQz3BQMCBgj4DV5QB3AAAAjElEQVQI12NgYGBr/v9fJYABDBr/A8HnBBCT5T8YSIHY/hD2xw0MDJz/oaCAgYEJzPge9P8PA8N8MFua/f93Bob7YPYEoK4EBnsQ8x8PkAhg0P//X/6/wXoo+8fGT2n6IDZQzRcuKeb/IDZIb8MGsAEJIDO/coKtANv18SCI/QfVDQi3obkZ4RdkPwIAp7CQYJ4v5qYAAAAASUVORK5CYII=');height: 16px;width: 16px;position: absolute;left: 4px;background-size: 100%;background-repeat: no-repeat;top:6px;}
.cg-table-two .cg_best_value:before{background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAMAAACeyVWkAAAAM1BMVEUAAAD///////////////////////////////////////////////////////////////+3leKCAAAAEHRSTlMAEIDPv5/vIGBQ349wQK8w3CFExAAAAI1JREFUGNNdjlsSwzAIAwXBsZ1Xuf9pSyge4+4fOwiBgG5mbhWZWvSH9ClZJw+FLJrZaG4mxG/qP9eSL5HcAdJJiXsddy4Ke46u3dvp8lnCblReuWkJO35kkxESdJfm4DJaq0vLV5NBA0Qvk5md8L4munDCeHTlIJPekvMfOCR502TQjrHIhERnETlbuC/a/xCgJyUzoQAAAABJRU5ErkJggg==');}
.cg-table-two .cg_best_value:after{border-left-color:var(--cg-theme-color);}
.cg-table-two .cg_best_value{background-color: var(--cg-theme-color);}



@media screen and (max-width:860px){
.cg-table-one tbody td .cg-title{text-align: center;}

.cg-table-one thead tr th:not(:nth-child(2)) {display: none;}
.cg-table-one thead tr th:nth-child(2) {width: 100%;}
.cg-table-one tbody {display: flex;flex-direction: column;}
.cg-table-one tbody tr {display: flex;flex-wrap: wrap;background: #fff;}
.cg-table-one tbody tr:not(:last-child){border-bottom: 1px solid #ddd;}
.cg-table-one tbody tr td:nth-child(1){width: 100%;order: 1;border: none!important;background: #fff;text-align: center;padding: 10px 5px 0 5px!important;display: flex!important;}
.cg-table-one tbody tr td:nth-child(3) {order: 2;width: 100%;background: #fff;box-sizing: border-box;border: none!important;display: flex;flex-direction: column;padding: 10px!important;margin: auto;}
.cg-table-one tbody tr td:nth-child(2) {width: 45%;order: 3;margin: 0;box-sizing: border-box;border: none!important;display: flex;justify-content: center;align-items: center;margin: auto;}
.cg-table-one tbody tr td:nth-child(4) {order: 4;width: 70%;background: #fff;box-sizing: border-box;border: none!important;display: flex;flex-direction: column;padding: 0 10px 0 8px!important;margin: auto;}
.cg-table-one tbody tr td:nth-child(5) {background: #fff;padding-top: 10px!important;border: none!important;width: 100%;order: 4;min-height: 60px;display: flex;justify-content: center;align-items: center;}
.cg-table-one tbody tr td:not(:nth-child(1)) .lable{display: none;}
.cg-table-one tbody td:nth-child(1) .lable{margin-left: -16px;}
.cg-table-one tbody td:nth-child(1) .lable:before{left: -2px;}

[class*='cg-table-'] tbody td .cgi_score:after{white-space: nowrap;}
}
@media screen and (max-width:767px){
.cg-table-two thead{display: none;}
.cg-table-two tbody tr td:nth-child(4){width: 1%;}
.cg-table-two tbody tr td:nth-child(1){width: 1%;padding: 0px;}
.cg-table-two tbody tr td:nth-child(2){width: 25%;}
.cg-table-two tbody td .cg-title{ font-size: 16px;font-weight: normal;margin:0px 0 5px 0; }
.cg-table-two tbody td .cg-brand{ font-size: 13px;font-weight: normal; }
.cg-table-two tbody td .cgi_score{font-size: 25px;padding: 0 8px;}
.cg-table-two tbody td .cgi_score:after{font-size:14px;letter-spacing: 0px;line-height: 16px;padding: 2px 4px;}
.cg-table-two tbody tr td .cg-button{padding: 6px 8px;font-size: 18px;line-height: 22px;}
.cg-table-two tbody tr td{padding: 8px;}
.cg-table-two .cg_best_value, .cg-table-two .cg_first_place{display: none;}
[class*='cg-table-'] tbody td .cg_rank{background: var(--cg-theme-color);border: 0;border-radius: 50%;color: #fff;font-size: 22px;font-weight: 400;height: 30px;left:0px;line-height: 30px;position: absolute;top: 4px;width: 30px;z-index: 100;}
}
@media screen and (max-width: 480px){
.cg-table-two tbody tr td .cg-button{ font-size: 14px;line-height: 18px; }
.cg-table-two tbody tr{border-bottom:1px solid #ddd}
.cg-table-two tbody tr td{border-bottom: 0px;}
[class*='cg-table-'] tbody td .cg_rank{font-size: 17px;}
}
@media screen and (max-width: 414px){
.cg-table-one tbody td img{margin:25px auto 0;}
.cg-table-two tbody tr td:nth-child(2){padding-right: 0px;}
.cg-table-two tbody td .cgi_score{padding: 0px;}
.cg-table-two tbody tr td:nth-child(4){padding-right: 0px;padding-left: 0px;}
.cg-table-two tbody td .cg-title{font-size: 14px;}
.tm-col-left{display:none;}
}                            
</style>


<div class="container">
    <div class="tm-row">
        <div class="tm-col-left">
            <script type="text/javascript">
            	atOptions = {
            		'key' : '8fe5de391184cf4388c783a4bc23ba0f',
            		'format' : 'iframe',
            		'height' : 90,
            		'width' : 728,
            		'params' : {}
            	};
            	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://carpenterexplorerdemolition.com/8fe5de391184cf4388c783a4bc23ba0f/invoke.js"></scr' + 'ipt>');
            </script>
        </div>
        <main class="tm-col-right">
            <section class="tm-content tm-about">
                <h2 class="tm-content-title">Get Price, Current Stock, Rating and much more by Daraz product URL</h2>
                <div class="media my-3">
                    <div class="media-body">
                        <form action="{{route('getdarazdata')}}" method="GET">
                            <input
                                id="url"
                                class="form-control mb-3" 
                                type="url"
                                name="url"
                                @if(isset($url))
                                    value = '{{$url}}'br
                                @endif
                                placeholder="e.g. https://www.daraz.pk/products/......." 
                                required
                             >
                            <button class="btn btn-success" type="submit">Get Data</button>
                            <button class="btn btn-info" onclick="document.getElementById('url').value = '' ">Clear</button>
                            <a href="{{route('contactus')}}" target="_blank"><button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bug-fill" viewBox="0 0 16 16">
                              <path d="M4.978.855a.5.5 0 1 0-.956.29l.41 1.352A4.985 4.985 0 0 0 3 6h10a4.985 4.985 0 0 0-1.432-3.503l.41-1.352a.5.5 0 1 0-.956-.29l-.291.956A4.978 4.978 0 0 0 8 1a4.979 4.979 0 0 0-2.731.811l-.29-.956z"/>
                              <path d="M13 6v1H8.5v8.975A5 5 0 0 0 13 11h.5a.5.5 0 0 1 .5.5v.5a.5.5 0 1 0 1 0v-.5a1.5 1.5 0 0 0-1.5-1.5H13V9h1.5a.5.5 0 0 0 0-1H13V7h.5A1.5 1.5 0 0 0 15 5.5V5a.5.5 0 0 0-1 0v.5a.5.5 0 0 1-.5.5H13zm-5.5 9.975V7H3V6h-.5a.5.5 0 0 1-.5-.5V5a.5.5 0 0 0-1 0v.5A1.5 1.5 0 0 0 2.5 7H3v1H1.5a.5.5 0 0 0 0 1H3v1h-.5A1.5 1.5 0 0 0 1 11.5v.5a.5.5 0 1 0 1 0v-.5a.5.5 0 0 1 .5-.5H3a5 5 0 0 0 4.5 4.975z"/>
                            </svg>&nbsp; Report an Error</button></a>
                        </form>
                        <div class="alert-warning">
                            <b>This is Beta Version:</b> Some of the links may not work, so be patient and keep following us on <a href="https://www.facebook.com/comparepk/" target="_blank">facebook page</a>. We are actively Updating. Thanks
                        </div>
                        @if(isset($data))
                            {{$data['message']}}
                        @if(isset($data['response']->product_title))
                            
    <div class="container">
        <table class="cg-table-one cg-black">
            <thead>
                <tr>
                    <th>IMAGE</th>
                    <th>PRODUCT TITLE</th>
                    <th>DETAILS</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                <span class="lable"><small>{{ $data['response']->brand }}</small></span>
                </td>
                <td>
                <span class="lable"><small>{{ $data['response']->brand }}</small></span>
                    <img src="{{ json_decode($data['response']['response'],true)['data']['root']['fields']['skuInfos']['0']['image'] }}">
                </td>
                <td>
                    <a class="cg-title" href="{{ $data['response']['product_link'] }}" target="_blank" rel="nofollow">{{ $data['response']['product_title'] }}</a>
                </td>
                <td>
                    <ul class="cgt-details">
                        <li style="display: flex;justify-content: space-between;"><b>Rating:</b>
                            <div>
                                {{ $data['response']['product_rating'] }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/> </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/> </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/> </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/> </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/> </svg>
                                
                            </div>
                        </li>
                        <li style="display: flex;justify-content: space-between;"><b>Reviews:</b> {{ $data['response']['product_total_rating'] }}</li>
                        <li style="display: flex;justify-content: space-between;"><b>Sales (sale by stock difference) :</b>{{ $history['sale'] }}</li>
                        <li style="display: flex;justify-content: space-between;"><b>Earning :</b>{{ $history['earning'] }}</li>
                    </ul>
                </td>
                <td>
                    <form action="{{route('store_group')}}" method="POST" target="_blank">
                        @csrf
                        <input type="hidden" name="group_name" value="My List">
                        <input type="hidden" name="url" value="{{ $data['response']['product_link'] }}">
                        <button type="submit" class="cg-button">Add to my List</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
                            <!--Old Simple Dyanamic Data Start Here-->   
                            <!--*******************-->
                            <!--    <h5>{{ $data['response']['product_title'] }}</h5>-->
                            <!--    <p>{{ $data['response']['product_link'] }}</p>-->
                            <!--    <p>Average Rating: {{ $data['response']['product_rating'] }} - Ratings: {{ $data['response']['product_total_rating'] }}</p-->
                            <!--*******************-->
                            <!--Old Simple Dyanamic Data End Here-->
                                
                                <div class="alert-warning" id="history">
                                    
                                    <table class="table" style="box-shadow: 2px 10px 32px -2px rgba(214,45,214,0.78);">
                                        <h4>Date Wise Stock history</h4>
                                        <thead>
                                            <tr>
                                                <td>Date</td>
                                                <td>Stock</td>
                                                <td>Total Ratings</td>
                                                <td>Price</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($history['data'] as $history_data)
                                            <tr>
                                                <td> {{ $history_data->date }} </td>
                                                <td> {{ $history_data->stock }} </td>
                                                <td> {{ $history_data->rating }} </td>
                                                <td> {{ $history_data->price }} </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <!--Ads Start Here-->
                                    Sposners Ads 
                                    <script async="async" data-cfasync="false" src="//carpenterexplorerdemolition.com/664ecacda93a041580ac31d8afa308bb/invoke.js"></script>
                                    <div id="container-664ecacda93a041580ac31d8afa308bb"></div>
                                    <!--Ads End Here-->
                                </div>
                            @endif
                        @endif
                    </div>
                </div>                       
            </section>
        </main>
    </div>
</div>
@endsection