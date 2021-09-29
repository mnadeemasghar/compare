@extends('layouts.newapp')

@section('content')
            <div class="tm-row">
                <div class="tm-col-left"></div>
                <main class="tm-col-right tm-contact-main"> <!-- Content -->
                    <section class="tm-content tm-contact">
                    @if (\Session::has('message'))
                        <div class="alert alert-success">
                            {!! \Session::get('message') !!}
                        </div>
                    @endif
                        <div class="form-group">
                            <form action="{{route('submail')}}" method="post">
                                @csrf
                                <input class="form-control" name="submail" type="email" placeholder="enter email to subscribe our newsletter">
                                <button class="btn-danger">Subscribe</button>
                            </form>
                        </div>
                        @if(isset($posts) && $posts->count() > 0)
                            @foreach($posts as $post)
                                <span>{{$post->updated_at}}</span>
                                <h2 class="mb-4 tm-content-title">{{$post->title}}</h2>
                                <p class="mb-85">{{$post->body}}</p>
                            @endforeach
                            {{$posts->withQueryString()->links()}}
                            @else
                            {{__('No Post Available to show')}} 
                        @endif
                    </section>
                </main>
            </div>
@endsection      
