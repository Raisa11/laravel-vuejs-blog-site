@extends('admin.master')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @if(Session::get('message'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <div class="col-xl-8">
                    <h3 class="card-title">Categories</h3>
                    </div>
                        <div class="col-xl-4">
                            <a href="{{url('/admin-category/create')}}" class="float-right btn btn-primary"  title="add category"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$category->cat_name}}</td>
                            <td>{{$category->cat_desc}}
                            </td>
                            <td><a href="{{url('/admin-category/'.$category->id.'/edit')}}" class="badge badge-primary">Edit</a>
                                <form action="{{url('/admin-category/'.$category->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                <button  class=" btn badge badge-danger">Delete</button>
                                </form> </td>


                        </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
