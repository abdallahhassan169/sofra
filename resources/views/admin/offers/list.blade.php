@extends('admin/layout')
@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Offers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Offers List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form class="container">
            <div class="input-group input-group-sm">
                <input class="form-control" type="search" name="name" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form><br>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Of offers....Count:{{$records->count()}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Meal</th>
                                    <th>Restaurant</th>
                                    <th>Details</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($records as $a)
                                    @if($a)
                                    <tr>

                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            {{$a->meal->name}}
                                        </td>
                                        <td>
                                            {{$a->restaurant->name}}
                                        </td>
                                        <td>
                                            <a href="{{route('offers.show',$a->id)}}">
                                                <button class="btn btn-primary">Show</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{route('offers.destroy',$a->id)}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn-danger">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endif
                                @endforeach
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

@endsection
