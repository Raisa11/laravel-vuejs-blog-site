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

                    <h3 class="card-title"> Edit Blogs</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Blog</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('/admin-blog/'.$adminBlog->id)}}" method="post" enctype="multipart/form-data">
                           @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Category Name</label>
                                    <select multiple name="cat_id[]" class="form-control" >
                                        <option value="">--select__</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @foreach ($adminBlog->blogCat as $cat) {{$cat->cat_id == $category->id ? 'selected' : ''}} @endforeach > {{$category->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Blog Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$adminBlog->title}}">
                                  <input type="hidden" class="form-control" name="user_id" value="{{auth()->user()->id}}">
                                    <input type="hidden" class="form-control" name="blog_id" value="{{$adminBlog->id}}">
                                </div>
                                <div class="form-group">
                                    <label >Author Name</label>
                                    <input type="text" class="form-control" name="author" value="{{$adminBlog->author}}">
                                </div>
                                <div class="form-group">
                                    <label >Blog Short Description</label>
                                    <input type="text" class="form-control" name="short_desc" value="{{$adminBlog->short_desc}}">
                                </div>
                                <div class="form-group">
                                    <label >Blog Long Description</label>
                                    <textarea id="editor1" class="form-control" name="long_desc"   >
                                        {{$adminBlog->long_desc}}

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label >Blog Image</label>
                                    <input type="file" class="form-control" name="image" >
                                    <img src="{{asset($adminBlog->image)}}" width="100">
                                </div>
                                <div class="form-group ">


                                    <label >Blog publication status</label>

                                    <div >
                                        <input type="radio"  name="status" value="1" {{$adminBlog->status == 1 ? 'checked':''}} > published
                                        <input type="radio"  name="status"  value="0" {{$adminBlog->status == 0 ? 'checked':''}} > unpublished
                                    </div>
                                </div>
                                <button type="submit" name="btn" class="btn btn-primary">Update Blog</button>



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



