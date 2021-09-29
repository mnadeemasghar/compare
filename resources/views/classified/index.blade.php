@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href='{{route('addclassified')}}'><button class='btn btn-success'>{{__('Add new Classified')}}</button></a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(isset($classifieds))
                        @if($classifieds->count() > 0 )
                        @else
                        {{__('Classifieds are zero')}}
                        @endif
                    @else
                    {{__('No classified Set')}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
