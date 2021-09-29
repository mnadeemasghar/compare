@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                        <li><a href="{{ route('items') }}">{{ __('Items') }}</a></li>
                        <li><a href="{{ route('create-item') }}">{{ __('Create Item') }}</a></li>
                        <li><a href="{{ route('price_list') }}">{{ __('price list') }}</a></li>
                        <li><a href="{{ route('posts') }}">{{ __('Posts') }}</a></li>
                        <ul>
                            <li><a href="{{ route('createpost') }}">{{ __('Create Post') }}</a></li>
                        </ul>
                    </ul>
                    @if($users->count() > 0)
                        <div class="row">
                            @foreach($users as $user)
                            <ul>
                                @if($user->status == 'inactive')
                                <li>
                                    <p>Name:{{$user->name}}</p>
                                    <p>Email:{{$user->email}}</p>
                                    <p>Role:{{$user->role}}</p>
                                    <p>Status:{{$user->status}}</p>
                                    <p>Created:{{$user->created_at}}</p>
                                </li>
                                @endif
                            </ul>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
