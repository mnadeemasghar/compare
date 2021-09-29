@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">{{ __('Contact Us') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(isset($_GET['message']))
                    <div class="alert-danger">
                        {{$_GET['message']}}
                    </div>
                    @endif
                    <form action="{{route('submitContactUs')}}" method="post" id="contactus">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name" required>
                        </div>
                        
                        <!-- <div class="form-group">
                            <label for="email">Email (Optional)</label>
                            <input class="form-control" id="email" name="email" type="email" placeholder="Please enter a valid email">
                        </div> -->
                        
                        <!-- <div class="form-group">
                            <label for="phone">Contact Number (Optional)</label>
                            <input class="form-control" id="phone" name="phone" type="number" placeholder="Contact number here">
                        </div> -->
                        
                        <div class="form-group">
                            <label for="message">Message<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="message" id="message" required>
                        </div>
                        
                        <!-- google Captcha -->
                        <!-- <div class="g-recaptcha brochure__form__captcha" data-sitekey="6Lf4oBscAAAAAMgfkNIijNrsnX6moCsTwyHTdgpo"></div> -->
                            <!-- <input type="hidden" name="recaptcha" id="recaptcha"> -->

                        <div class="form-group">
                            <button class="g-recaptcha" 
        data-sitekey="6Lf4oBscAAAAAMgfkNIijNrsnX6moCsTwyHTdgpo" 
        data-callback='onSubmit' 
        data-action='submit'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 <script>
   function onSubmit(token) {
     document.getElementById("contactus").submit();
   }
 </script>
    <script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6Lf4oBscAAAAAMgfkNIijNrsnX6moCsTwyHTdgpo', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
          });
        });
      }
  </script>
@endsection
