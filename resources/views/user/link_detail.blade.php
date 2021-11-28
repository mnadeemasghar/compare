@extends('layouts.user')

@section('content')

<!-- Main content -->
<div class="row pt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Link Detail</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <th>product_title</th>
                        <th>product_rating_score</th>
                        <th>product_rating_total</th>
                        <th>updated_at</th>
                        <th>main_category</th>
                    </thead>
                    <tbody>
                        @foreach($details as $detail)
                            <tr>
                                <td>{{$detail->product_title}}</td>
                                <td>{{$detail->product_rating_score}}</td>
                                <td>{{$detail->product_rating_total}}</td>
                                <td>{{$detail->updated_at}}</td>
                                <td>{{$detail->main_category}}</td>
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