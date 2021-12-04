@extends('layouts.chrome')

@section('content')
<h2>{{ $data['response']->product_title }}</h2>

<ul>
    <li><b>Brand Name: </b><i>{{ $data['response']->seller_name }}</i></li>
    <li><b>Main Category: </b><i>{{ $data['response']->main_category }}</i></li>
    <li><b>Sub Category: </b><i>{{ $data['response']->sub_category }}</i></li>
    <li><b>Sub Sub Category: </b><i>{{ $data['response']->sub_sub_category }}</i></li>
</ul>

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
        <tr>
            <td>{{ $data['response']->product_rating_score }}</td>
            <td>{{ $data['response']->product_rating_total }}</td>
            <td>{{ $data['response']->updated_at }}</td>
            <td>{{ $data['response']->product_sale_price }}</td>
            <td>{{ $data['response']->product_stock }}</td>
            <td>{{ $data['response']->qas_no }}</td>
        </tr>
    </tbody>
</table>

<footer>
    Developed by: M Nadeem Asghar (<a href="https://www.linkedin.com/in/m-nadeem-asghar-82268478/" target="_blank">Linkedin Profile</a>)
</footer>
@endsection