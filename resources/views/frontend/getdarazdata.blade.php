@extends('layouts.app')

@section('content')
<div class="container">
    <div class="tm-row">
        <div class="tm-col-left"></div>
        <main class="tm-col-right">
            <section class="tm-content tm-about">
                <h2 class="mb-5 tm-content-title">Get Price, Current Stock, Rating and much more by Daraz product URL</h2>
                <hr class="mb-4">
                <div class="media my-3">
                    <div class="media-body">
                        <form action="{{route('getdarazdata')}}" method="GET">
                            <input
                                class="form-control" 
                                type="url"
                                name="url"
                                @if(isset($url))
                                    value = '{{$url}}'
                                @endif
                                placeholder="e.g. https://www.daraz.pk/products/......." 
                                required
                            >
                            <button class="btn btn-success" type="submit">Get Data</button>
                        </form>
                        <div class="alert-warning">
                            <b>This is Beta Version:</b> Some of the links may not work, so be patient and keep following us on <a href="https://www.facebook.com/comparepk/" target="_blank">facebook page</a>. We are actively Updating. Thanks
                        </div>
                        @if(isset($data))
                            {{$data['message']}}
                            <a href="{{route('contactus')}}" target="_blank"><button class="btn-danger">Report an Error</button></a>
                            <hr class="mb-4">
                            
                            @if(isset($data['response']['product_title']))
                                <h5>{{ $data['response']['product_title'] }}</h5>
                                <p>{{ $data['response']['product_link'] }}</p>
                                <p>Average Rating: {{ $data['response']['product_rating'] }} - Ratings: {{ $data['response']['product_total_rating'] }}</p>
                                <div class="alert-warning" id="history">
                                    <h4>Date Wise Stock history</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>Date</td>
                                                <td>Stock</td>
                                                <td>Total Ratings</td>
                                                <td>Price</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($history as $history_data)
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
                                <p>::: Variants :::</p>
                                <div class="row">
                                    @foreach($data['response']['product_skus'] as $skus)
                                    <div class="col-md-3 mb-2">
                                        <div class="card">
                                            <img class="card-img-top" src="{{ $skus['image'] }}" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Stock: {{ $skus['stock'] }}</h5>
                                                <h5 class="card-title">Price: {{ $skus['price']['salePrice']['value'] }}</h5>
                                                <h5 class="card-title">SKU ID: {{ $skus['skuId'] }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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