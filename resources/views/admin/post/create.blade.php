@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">{{ __('Create / Edit Post') }}</div>

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
                    <form
                        @if(isset($post))
                            action="{{route('updatepost')}}" 
                        @else
                            action="{{route('storepost')}}" 
                        @endif

                        method="post"
                    >
                        @csrf
                        @if(isset($post))
                            <input type="hidden" name='id' value="{{$post->id}}" > 
                        @endif
                        <input 
                            @if(isset($post))
                                value="{{$post->title}}"
                            @endif
                            class="form-control" 
                            type="text" 
                            name="title" 
                            placeholder="Title" 
                            required
                        >
                        <textarea
                            class="form-control" 
                            name="body" 
                            cols="30" 
                            rows="10" 
                            required
                        >
                            @if(isset($post))
                                {{$post->body}}
                            @endif
                        </textarea>
                        <input type="submit" value="Post">
                    </form>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
