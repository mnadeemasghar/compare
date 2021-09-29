@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">{{ __('Show Item') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(isset($item) && $item->count() > 0)
                    <form>
                        @csrf
                        <h5>
                            {{$item->name}}
                        </h5>
                        <p>
                            {{$item->description}}
                        </p>
                        <div class='row'>
                            <div class='col-4'>
                                <label for="name">Attribute Name:</label>
                                <!-- <select
                                class="select2 form-control" 
                                class='form-control'
                                name="name" 
                                id='name'>
                                </select> -->
                                <input 
                                    type="text"
                                    class='form-control'
                                    name="name" 
                                    id='name'
                                >
                            </div>
                            <div class='col-6'>
                                <label for="description">Description</label>
                                <input 
                                    type="text"
                                    class='form-control'
                                    name='description'
                                    id='description'
                                    placeholder='Please enter the attribute value or description here...'
                                >
                            </div>
                            <div class='col-2'>
                                <a
                                onclick="submitForm()"
                                class="btn btn-primary"
                                id="submit">
                                    Add
                                </a>
                            </div>
                            </form>
                            @endif
                        </div>
                    </div>
                <div class='card-footer'>
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody id='result'>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', showAttr());
    function showUniqueAttr(){

        // Create an XMLHttpRequest object
        const xhttp = new XMLHttpRequest();

        // Define a callback function
        xhttp.onload = function() {
        // Here you can use the Data
        document.getElementById("name").innerHTML =
        this.responseText;
        }

        // Send a request
        $url = "{{route('show-unique-attributes')}}";
        xhttp.open("GET", $url);
        xhttp.send();
    }

    function showAttr(){
        $item_id = {{$item->id}};

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
        $url = "{{route('attributes')}}";
        xhttp.open("GET", $url+"?item_id="+$item_id);
        xhttp.send();
        showUniqueAttr();
    }

    function delAttr($attr_id){
        $item_id = {{$item->id}};

        // alert($name+$description);

        // Create an XMLHttpRequest object
        const xhttp = new XMLHttpRequest();

        // Define a callback function
        xhttp.onload = function() {
        // Here you can use the Data
        // document.getElementById("result").innerHTML =
        // this.responseText;
        showAttr();
        }

        // Send a request
        $url = "{{route('delete-attribute')}}";
        xhttp.open("GET", $url+"?item_id="+$item_id+"&attr_id="+$attr_id);
        xhttp.send();
        showUniqueAttr();
    }

    function submitForm(){
        $name = document.getElementById("name").value;
        $description = document.getElementById("description").value;
        $item_id = {{$item->id}};

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
        $url = "{{route('store-attribute')}}";
        xhttp.open("GET", $url+"?name="+$name+"&description="+$description+"&item_id="+$item_id);
        xhttp.send();
        showUniqueAttr();
    }
</script>
@endsection
