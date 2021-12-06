@extends('layouts.chrome')

@section('content')
<div class="row">
    <div class="col-4">
        <img class="img-fluid" src="{{ json_decode($data['response']['response'],true)['data']['root']['fields']['skuInfos']['0']['image'] }}">
    </div>
    <div class="col-8">
        <h5>{{ $data['response']->product_title }}</h5>
        <ul>
            <li><b>Brand Name: </b><i>{{ $data['response']->seller_name }}</i></li>
            <li><b>Main Category: </b><i>{{ $data['response']->main_category }}</i></li>
            <li><b>Sub Category: </b><i>{{ $data['response']->sub_category }}</i></li>
            <li><b>Sub Sub Category: </b><i>{{ $data['response']->sub_sub_category }}</i></li>
        </ul>
    </div>
</div>


<div class="alert alert-warning">
    {{__("Visit daily to view updated record!")}}
</div>
<table class="table table-bordered table-hover">
    <thead>
        <th>Average Rating</th>
        <th>Total Reviews</th>
        <th>Updated At</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Questions</th>
    </thead>
    
    <tbody>
        @if(isset($history) && $history->count() > 0)
            @foreach($history as $data)
                <tr>
                    <td>{{ $data->product_rating_score }}</td>
                    <td>{{ $data->product_rating_total }}</td>
                    <td><small>{{ date('d M y', strtotime($data->updated_at)) }}</small></td>
                    <td>{{ $data->product_sale_price }}</td>
                    <td>{{ $data->product_stock }}</td>
                    <td>{{ $data->qas_no }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

<footer>
    Developed by: M Nadeem Asghar (<a href="https://www.linkedin.com/in/m-nadeem-asghar-82268478/" target="_blank">Linkedin Profile</a>)
</footer>
@endsection