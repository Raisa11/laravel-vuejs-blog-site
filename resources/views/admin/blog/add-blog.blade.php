@extends('admin.master')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blogs</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">

                    <h3 class="card-title"> Add Blogs</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Blog</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('/admin-blog')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Category Name</label>
                                   <select multiple name="cat_id[]" class="form-control" >
                                       <option value="">--select__</option>
                                       @foreach($categories as $category)
                                       <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                                <div class="form-group">
                                    <label >Blog Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Title">
                                    <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                                </div>
                                <div class="form-group">
                                    <label >Author Name</label>
                                    <input type="text" class="form-control" name="author" placeholder="Enter author name">
                                </div>
                                <div class="form-group">
                                    <label >Blog Short Description</label>
                                    <input type="text" class="form-control" name="short_desc" placeholder="Enter short description">
                                </div>
                                <div class="form-group">
                                    <label >Blog Long Description</label>
                                    <textarea id="editor1" class="form-control" name="long_desc" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label >Blog Image</label>
                                    <input type="file" class="form-control" name="image" >
                                </div>
                                <div class="form-group ">


                                    <label >Blog publication status</label>

                                    <div >
                                    <input type="radio"  name="status" value="1" > published
                                    <input type="radio"  name="status"  value="0"> unpublished
                                    </div>
                                </div>
                                <button type="submit" name="btn" class="btn btn-primary">Add Blog</button>



                            </div>

                            <!-- /.card-body -->

                        </form>
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


