@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h5>{{ __('Items') }}</h5>
            @if(isset($items) && $items->count() > 0)
            <table class="table table-hover table-borderless" id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Descrtiption</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><a href='{{$item->id}}' class='btn'>{{$item->name}}</a></td>
                        <td>{{$item->description}}</td>
                        <td>
                            <a class="btn btn-primary" href={{route('show-item', ['id' => $item->id])}}>Attributes</a>
                            <a class="btn btn-danger" href={{route('del-item', ['id' => $item->id])}}>Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            {{__('No Record found')}}
            @endif
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
