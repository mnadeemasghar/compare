@extends('layouts.newapp')

@section('content')
    <div class="tm-row justify-content-center">
        <!-- <div class="tm-col-right"> -->
        <main class="col-12">
            <section class="container">
            <h2 class="mb-4 tm-content-title">Search your product by name</h2>
                @if (\Session::has('message'))
                    <div class="alert alert-success">
                        {!! \Session::get('message') !!}
                    </div>
                @endif
                <form id="contact-form" action="{{route('search',['search'])}}" method="GET">
                    <div class="form-group mb-4">
                        <input type="text" name="search" class="form-control" placeholder="Search" required=""  @if(isset($request['search'])) value="{{$request['search']}}" @endif >
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-big btn-primary">Search It</button>
                    </div>
                <div class="col-md-12 mt-2">
                    @if(isset($searchitems))
                    <p>
                        <input type="text" name="category" placeholder="Category" list="category" @if(isset($request['category'])) value="{{$request['category']}}" @endif>
                        <datalist id="category">
                            @foreach($categories as $category)
                                <option value="{{$category->category}}"/>
                            @endforeach
                        </datalist>
                        <input type="text" name="store" placeholder="Store" list="store"  @if(isset($request['store'])) value="{{$request['store']}}" @endif>
                        <datalist id="store">
                            @foreach($stores as $store)
                                <option value="{{$store->store}}"/>
                            @endforeach
                        </datalist>
                        <input type="number" name="minprice" placeholder="Minimum Price" @if(isset($request['minprice'])) value="{{$request['minprice']}}" @endif>
                        <input type="number" name="maxprice" placeholder="maximum Price" @if(isset($request['maxprice'])) value="{{$request['maxprice']}}" @endif>

                    </p>
                    <p>
                        @foreach($request as $key => $filter)
                        {{$key}} =
                        {{$filter}},
                        @endforeach
                        Result(s) Found: {{$counts}}
                    </p>
                        @foreach($searchitems as $searchitem)
                            <div class="card mb-2">
                                <div class="xcollapse" id="collapseExample"> 
                                    <!-- $searchitem->id -->
                                <div class="card-body">
                                <div>
                                            <span class="text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                                                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z"/>
                                                </svg>
                                                {{parse_url($searchitem->count_url)['host']}}
                                            </span>
                                        </div>
                                    <div class="mb-3 p-2">
                                        <a class="text-info" >
                                            {{$searchitem->name}}
                                        </a>
                                        <ul class="text-dark">
                                            <li>Record Found: {{$searchitem->count}}</li>
                                            <li>Last Update: {{date('d M, Y',strtotime($searchitem->latest_date))}}</li>
                                            <li>Current Price: {{$searchitem->latest_price}}</li>
                                        </ul>
                                        <button
                                        onclick="getdetail('{{$searchitem->count_url}}')" 
                                        type="button" 
                                        class="btn btn-success" 
                                        data-toggle="modal" 
                                        data-target="#exampleModalLong">
                                        View Detail
                                        </button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                        {{$searchitems->withQueryString()->links()}}
                    @endif
                </div>
                </form>
            </section>
        </main>
    </div>
@endsection