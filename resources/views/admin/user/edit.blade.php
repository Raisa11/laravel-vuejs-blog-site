@extends('admin.master')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">

                    <h3 class="card-title"> Edit User</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            {{Form::open(['url'=>'/user/'.$users->id ,'method'=>'post'])}}
                            {{Form::hidden('_method','PUT')}}
                            <div class="form-group">
                                {{Form::label('Name')}}
                                {{Form::text('name',$value = $users->name ,['class'=>'form-control'])}}

                            </div>
                            <div class="form-group">
                                {{Form::label('Email')}}
                                {{Form::email('email',$value = $users->email,['class'=>'form-control','placeholder'=>'email'])}}
                            </div>
                            <div class="form-group">

                                {{Form::label('Address')}}
                                {{Form::text('address',$value=$users->address,['class'=>'form-control'])}}
                            </div>
                            <div class="form-group">

                                {{Form::label('Phone')}}
                                {{Form::text('phone', $value = $users->phone,['class'=>'form-control'])}}
                            </div>

                            <div class="form-group">

                                {{Form::label('Password')}}
                                {{Form::password('password',['class'=>'form-control'])}}
                            </div>
                            <div class="form-group">

                                {{Form::label('user role')}}

                                {{Form::select('role',['0'=>'select role','1'=>'super admin','2'=>'admin','3'=>'Editor'],$users->role,['class'=>'form-control'])}}


                            </div>
                            <div class="form-group">
                                {{Form::submit('Update user',['class'=>'btn btn-primary'])}}

                            </div>

                            {{Form::close()}}
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection




