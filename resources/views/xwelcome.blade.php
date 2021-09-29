@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if(isset($filters))
            <div class="alert alert-primary">
                <div class="row">
                    <div class="input-group input-group-sm mb-3">
                        <label for="filter">Filter By:</label>
                        <select name="filter" id="filter">
                            
                            @foreach($filters as $filter)
                            <option value="{{$filter->name}}">{{$filter->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
            </div>
            @endif
            <form method="GET" action="{{route('search')}}">
                <input
                    name="search" 
                    id="search" 
                    list="my-list"
                    autocomplete="off"
                    placeholder="eg. iphone, oppo" 
                    class="form-control"
                    @if(isset($search))
                    value="{{$search}}"
                    @endif
                    required
                    autofocus
                    >
                <button
                class="form-control btn btn-danger mt-2 mb-2"
                >
                Search
            </button>
            </form>
        </div>
        <div class="col-md-8">
            @if(isset($searchitems))
                @foreach($searchitems as $searchitem)
                @if($searchitem->prices_count > 0)
                    <div class="card mb-2">
                        <div class="card-header">
                            <a 
                                class="btn btn-link" 
                                data-toggle="collapse" 
                                href="#collapseExample{{$searchitem->id}}" 
                                role="button" 
                                aria-expanded="false" 
                                aria-controls="collapseExample{{$searchitem->id}}">
                                {{$searchitem->name}}({{$searchitem->prices_count}})
                            </a>
                        </div>
                        <div class="collapse" id="collapseExample{{$searchitem->id}}">
                        <div class="card-body">
                            @foreach($searchitem->prices as $prices)
                                @foreach($prices as $price)
                                    <div class="mb-3 p-2">
                                        <a href="{{$price->url}}" target="_blank">
                                            {{$price->name}}
                                        </a>
                                        <h5>Rs.{{$price->price}}</h5>
                                        <h6>Last Update: {{$price->created_at}}</h6>
                                        <div>
                                            <span class="text-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                                </svg>
                                                {{$price->reviews}}
                                            </span>
                                            <span class="text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                                                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z"/>
                                                </svg>
                                                {{$price->store}}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
