@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">{{ __('Create Item') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form>
                        @csrf
                        <input
                        class="form-control"
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Name"
                        required
                        >
                        
                        <input
                        class="form-control"
                        type="description"
                        name="description"
                        id="description"
                        placeholder="Description"
                        required
                        >
                        
                        <button
                        onclick="submitnewForm()"
                        class="btn btn-primary"
                        id="submit">
                            Add New Item
                        </button>
                    </form>
                    <a href="{{route('price_list')}}">Price List</a>
                </div>
                <div class="card-footer" id="result"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function submitnewForm(){
        $name = document.getElementById("name").value;
        $description = document.getElementById("description").value;

        document.getElementById("name").value = "";
        document.getElementById("description").value = "";

        // alert($name+$description);

        // Create an XMLHttpRequest object
        const xhttp = new XMLHttpRequest();

        // Define a callback function
        xhttp.onload = function() {
        // Here you can use the Data
        document.getElementById("result").innerHTML =
        this.responseText;
        }

        // Send a request
        $url = "{{route('store-item')}}";
        xhttp.open("GET", $url+"?name="+$name+"&description="+$description);
        xhttp.send();
    }
</script>

@endsection
