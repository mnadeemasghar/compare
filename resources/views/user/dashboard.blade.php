@extends('layouts.user')

@section('content')

<!-- Main content -->
<div class="row pt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">My List</h3>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{route('getdarazdata')}}">
                        <div class="input-group">
                            <input type="search" name="url" class="form-control form-control-lg" placeholder="Paste Daraz product url here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Link</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $link)
                            <tr>
                                <td><a href="{{route('link',['link'=>$link->darazlink()->first()->url])}}" >{{ $link->darazlink()->first()->url }}</a></td>
                                <td>{{ $link->darazlink()->first()->main_category }}</td>
                                <td>
                                    <form action="{{route('destroy_group')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$link->id}}">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.content -->
@endsection