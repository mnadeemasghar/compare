@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">{{ __('Site Map') }}</div>
                <div class="card-body">
                    <ul>
                        <li><a href="{{route('welcome')}}">HOME</a></li>
                        <li>How it Works</li>
                        <li><a href="{{route('aboutus')}}">About Us</a></li>
                        <li><a href="{{route('contactus')}}">Contact Us</a></li>
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('register')}}">Register</a></li>
                        <li>Available Items</li>
                        <ol>
                            @foreach($items as $item)
                                <li>
                                    <a href="{{route('search',['search' => $item->name])}}">{{$item->name}}</a>
                                </li>
                            @endforeach
                        </ol>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
