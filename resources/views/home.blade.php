@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
            @endif
            <div class="card shadow">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(isset($groups['data']) && $groups['data']->count() > 0)
                        <h3>Groups</h3>
                        @foreach($groups['data'] as $key => $group)
                            <div class="col-md-12">
                            <button
                                class="btn btn-primary mb-2"
                                type="button"
                                data-toggle="collapse"
                                data-target="#id{{$group->id}}"
                                aria-expanded="false"
                                aria-controls="id{{$group->id}}">
                                {{ $groups['history'][$key]->product_title }}
                            </button>
                                <div class="collapse multi-collapse" id="id{{$group->id}}">
                                    <a class="btn btn-secondary" id="{{$group->url}}" onclick="update_data('{{$group->url}}')">Update</a>
                                <table class="table ">
                                    <tr>
                                        <th>Date</th>
                                        <th>Stock</th>
                                        <th>Sale Price</th>
                                        <th>Rating</th>
                                        <th>Reviews</th>
                                    </tr>
                                    @foreach($groups['history'] as $link_history)
                                        @if($link_history->product_link == $group->url)
                                            <div class="col-md-12">
                                                <tr>
                                                    <td>{{ $link_history->created_at }}</td>
                                                    <td>{{ $link_history->product_stock }}</td>
                                                    <td>{{ $link_history->product_sale_price }}</td>
                                                    <td>{{ $link_history->product_rating_score }}</td>
                                                    <td>{{ $link_history->product_rating_total }}</td>
                                                </tr>
                                            </div>
                                        @endif
                                    @endforeach
                                </table>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function update_data(url) {
                console.log("URL:"+url);
                document.getElementById(url).innerHTML = "<span>Collecting...</span>";
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "{{route('getdarazdata_for_fetch')}}?url="+url, true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById(url).innerHTML = "<span>"+this.responseText+" - Reloading Page...</span>";
                            setTimeout(function()
                            {
                                location.reload();
                            }, 2000);
                    }
                };
            }
</script>
@endsection
