@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">{{ __('Posts') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (\Session::has('message'))
                        <div class="alert alert-success">
                            {!! \Session::get('message') !!}
                        </div>
                    @endif
                    @if(isset($posts))
                    <ul>
                        @foreach($posts as $post)
                        <li>
                            ID: {{$post->id}}<br>
                            Title: {{$post->title}}<br>
                            Created: {{$post->created_at}}<br>
                            Updated: {{$post->updated_at}}<br>
                            Body: {{$post->body}}
                            <a class="btn btn-info" href="{{route('editpost',['id' => $post->id])}}">Edit</a>
                            <a href="{{route('destroypost',['id' => $post->id])}}">Delete</a>
                        </li>
                        @endforeach
                    </ul>
                    {{$posts->links()}}           
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
