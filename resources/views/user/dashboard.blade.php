@extends('layouts.user')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-info mt-2">
            <div class="card-header">
                <h3 class="card-title">Category Wise Reviews</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
                <script>
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'line',
                        data: 
                        {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                            datasets:
                            [
                                {
                                    label: 'Category1',
                                    data: [12, 19, 3, 5, 2, 3],
                                    backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                                    borderColor: ['rgba(255, 99, 132, 1)'],
                                    borderWidth: 1
                                },
                                {
                                    label: 'Category2',
                                    data: [5, 10, 2, 7, 1, 10],
                                    backgroundColor: ['rgba(255, 255, 0, 255)'],
                                    borderColor: ['rgba(255, 255, 0, 255)'],
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="row">
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
                                        <td>{{ $link->url }}</td>
                                        <td>{{$link->category}}</td>
                                        <td>
                                            <form action="{{route('destroy_group')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="url" value="{{$link->url}}">
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
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection