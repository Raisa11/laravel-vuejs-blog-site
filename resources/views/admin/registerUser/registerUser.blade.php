@extends('admin.master')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Welcome to our Blog site</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mt-2">Registered Users</h3>
                    <a href="{{url('/registered-user/export')}}" class="float-right btn btn-primary " title="download excel file for the users"><i class="fa fa-download" aria-hidden="true"></i></a>


                </div>
                <div class="card-body">
                    @if(Session::get('message'))
                        {{Session::get('message')}}
                    @endif

                    <div class="row">
                        <div class="col">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($user as $users)

                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$users->fullname}}</td>
                                            <td>{{$users->email}}</td>
                                            <td>{{$users->phone}}</td>
                                            <td>{{$users->address}}</td>




                                        </tr>
                                    @endforeach


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>

                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </section>
    </div>


    <!-- /.card -->


    <!-- /.content -->

    <!-- /.content-wrapper -->
@endsection

