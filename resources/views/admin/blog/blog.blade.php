@extends('admin.master')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Blogs</h1>
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
                            <h3 class="card-title">Blogs</h3>
                        </div>
                        <div class="col-xl-4">
                            <a href="{{url('/admin-blog/create')}}" class="float-right btn btn-primary"  title="add category"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>User Name</th>
                            <th>Author</th>
                            <th>Short Description</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                       @foreach($post as $posts)


                           <tr>
                                <td>{{$i++}}</td>
                                <td>{{$posts->title}}</td>
                               <td>
                                   @foreach($posts->blogCat as $cat)
                                       {{$cat->admincategory->cat_name}}
                                       @if(!$loop->last),
                                   @endif

                                   @endforeach
                               </td>
                                <td>{{$posts->user->name}}</td>
                               <td>{{$posts->author}}</td>
                               <td>{{$posts->short_desc}}</td>
                               <td><img src="{{$posts->image}}" width="70"></td>
                               <td>{{$posts->status == 1 ? 'Published' : 'Unpublished'}}</td>
                               <td>
                                   <a href="{{url('admin-blog/'.$posts->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                   <a href="{{url('admin-blog/'.$posts->id.'/edit')}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                   @if(auth()->user()->role == 1 || auth()->user()->role== 2)
                                       <form action="{{url('/admin-blog/'.$posts->id)}}" method="post">
                                           @csrf
                                           @method('delete')
                                           <button  class=" btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                       </form>
{{--                                   <a href="" class="btn btn-danger"></a>--}}

                                   @if($posts->status == 1)
                                       <a href="{{url('admin-blog/unpublish/'.$posts->id)}}" class="btn btn-success"><i class="fas fa-arrow-up"></i></a>
                                   @else
                                       <a href="{{url('admin-blog/publish/'.$posts->id)}}" class="btn btn-warning"><i class="fas fa-arrow-down"></i></a>
                                       @endif
                                       @endif


                               </td>


                           </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>User Name</th>
                            <th>Author</th>
                            <th>Short Description</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
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

