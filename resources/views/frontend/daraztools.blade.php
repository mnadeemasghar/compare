@extends('layouts.newapp')

@section('content')
    <div class="tm-row">
        <div class="tm-col-left"></div>
        <main class="tm-col-right">
            <section class="tm-content tm-about">
                <h2 class="mb-5 tm-content-title">Daraz Tools</h2>
                <div class="media my-3">
                    <div class="media-body">
                        <p>Get Price, Current Stock, Rating and much more by Daraz product URL</p>
                        <form action="{{route('getdarazdata')}}" method="GET">
                            <input class="form-control" type="url" name="url" placeholder="e.g. https://www.daraz.pk/products/......." required>
                            <button class="btn btn-success" type="submit">Get Data</button>
                        </form>
                        <hr>
                        <h5>How to Use it</h5>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/r9B_GMf-DTk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                </div>                       
            </section>
        </main>
    </div>
@endsection