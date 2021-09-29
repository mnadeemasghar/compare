@extends('layouts.newapp')

@section('content')         
    <div class="tm-row">
        <div class="tm-col-left"></div>
        <main class="tm-col-right tm-contact-main"> <!-- Content -->
            <section class="tm-content tm-contact">
                <h2 class="mb-4 tm-content-title">Contact Us</h2>
                <p class="mb-85">Your rich feedback required to improve the system functionality. For any suggestion and query please feel free to contact.</p>
                @if (\Session::has('message'))
                    <div class="alert alert-success">
                        {!! \Session::get('message') !!}
                    </div>
                @endif
                <form id="contact-form" action="{{route('submitContactUs')}}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <input type="text" name="name" class="form-control" placeholder="Name" required="" />
                    </div>
                    <div class="form-group mb-4">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div class="form-group mb-5">
                        <textarea rows="6" name="message" class="form-control" placeholder="Message..." required=""></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-big btn-primary">Send It</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
@endsection    