@extends('layouts.newapp')

@section('content')
    <div class="tm-row">
        <div class="tm-col-left"></div>
        <main class="tm-col-right">
            <section class="tm-content tm-about">
                <div class="media my-3">
                    <div class="media-body">
                        <div class="col-md-12>
                            <div class="h-100 p-5 bg-light border rounded-3">
                                <p>Your IP <span class="btn btn-success" id="ip">192.168.0.1</span> tells us that you are in:</p>
                                <h2 id="city">Add borders</h2>
                                <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
                                <button class="btn btn-primary" type="button">Example button</button>
                            </div>
                          </div>
                    </div> 
                </div>                       
            </section>
        </main>
    </div>
@endsection