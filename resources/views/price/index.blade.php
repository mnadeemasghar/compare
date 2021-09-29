@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('update_price_list')}}" method="post">
                @csrf
                <input class="form-control" name="item_id" type="text" list="item_id" autofocus required>
                <datalist id="item_id">
                    @foreach($items as $item)
                        <option value={{$item->id}} > {{$item->name}}</option>
                    @endforeach
                </datalist>
                <input type="submit" name="submit" value="submit">
                <a href="{{ route('create-item') }}">{{ __('Create Item') }}</a>
                <table id="myTable">
                    <thead>
                        <th>Name</th>
                    </thead>
                    <tbody>
                    @foreach($prices as $price)
                        <tr><td>
                            <input type="checkbox" name="check[ {{$price->id}} ]" id="{{$price->id}}" value="{{$price->id}}" >
                            <label for="{{$price->id}}">
                                {{$price->name}}<a href="{{$price->url}}" target="_blank">Link</a>
                            </label>
                        </tr></td>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
