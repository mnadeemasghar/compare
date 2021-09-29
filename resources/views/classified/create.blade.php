@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Add new Classified')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method='POST' action=''>
                        @csrf
                        <div>
                            <label for='title'>Title</label>
                            <input type='text' class='form-control' name='title' id='title' required autofocus>
                        </div>

                        <div>
                            <label for='description'>Description</label>
                            <textarea id='summernote' name='description' class='form-control'></textarea>
                        </div>
                        <div>
                        <label for='image'>Attachment</label>
                            <input type='file' id='image' name='image' class='form-control'>
                        </div>
                        <div>
                            <input name='submit' class='form-control' type='submit'>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
