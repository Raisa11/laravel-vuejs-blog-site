<?php

namespace App\Http\Controllers;

use App\AdminBlog;
use App\AdminCategory;
use App\BlogPostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\DB;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = AdminBlog::with('user','blogCat.admincategory')->get();


       return view('admin.blog.blog',[
          'post'=>$post
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = AdminCategory::all();
        return view('admin.blog.add-blog',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction( function() use($request) {
        $blogImage = $request->file('image');
        $imageName = uniqid().$blogImage->getClientOriginalName();
        $directory = 'admin/blog-images/';
        $imageUrl = $directory.$imageName;
        Image::make($blogImage)->resize('1200','626')->save($imageUrl);

        $blog = new AdminBlog();
        $blog->user_id = $request->user_id;
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->short_desc = $request->short_desc;
        $blog->long_desc = $request->long_desc;
        $blog->image = $imageUrl;
        $blog->status = $request->status;
        $blog->save();

        $catid = $request->cat_id;
        foreach($catid as $cat) {
            $blogcat = new BlogPostCategory();
            $blogcat->cat_id = $cat;
            $blogcat->blog_id = $blog->id;
            $blogcat->save();
        }

        });

        return redirect('/admin-blog')->with('message','blog added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminBlog  $adminBlog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adminBlog = AdminBlog::with('blogCat')->find($id);
        $categories = AdminCategory::all();
        return view('admin.blog.show',[
            'adminBlog'=>$adminBlog,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminBlog  $adminBlog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminBlog = AdminBlog::with('blogCat')->find($id);
        $categories = AdminCategory::all();
        return view('admin.blog.edit',[
            'adminBlog'=>$adminBlog,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminBlog  $adminBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = AdminBlog::find($id);
        $blogImage = $request->file('image');
        if ($blogImage){
            unlink($blog->image);
            $imageName = uniqid().$blogImage->getClientOriginalName();
            $directory = 'admin/blog-images/';
            $imageUrl = $directory.$imageName;
            Image::make($blogImage)->resize('1200','626')->save($imageUrl);

            $blog->user_id = $request->user_id;
            $blog->title = $request->title;
            $blog->author = $request->author;
            $blog->short_desc = $request->short_desc;
            $blog->long_desc = $request->long_desc;
            $blog->image = $imageUrl;
            $blog->status = $request->status;
            $blog->save();

        }
        else{
            $blog->user_id = $request->user_id;
            $blog->title = $request->title;
            $blog->author = $request->author;
            $blog->short_desc = $request->short_desc;
            $blog->long_desc = $request->long_desc;

            $blog->status = $request->status;
            $blog->save();

        }

        DB::table('blog_post_categories')
            ->where('blog_id',$request->blog_id)
            ->delete();

        $catid = $request->cat_id;
        foreach($catid as $cat) {
            $blogcat = new BlogPostCategory();
            $blogcat->cat_id = $cat;
            $blogcat->blog_id = $blog->id;
            $blogcat->save();
        }

        return redirect('/admin-blog')->with('message','blog updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminBlog  $adminBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminBlog = AdminBlog::with('blogCat')->find($id);
        unlink($adminBlog->image);
        $adminBlog->delete();
        DB::table('blog_post_categories')
            ->where('blog_id',$id)
            ->delete();

        return back()->with('message','blog deleted successfully');;
    }

    public function unpublishedBlog($id){

        $blogPost = AdminBlog::find($id);
        $blogPost->status = 0;
        $blogPost->save();
        return back();

    }
    public function publishedBlog($id){
        $blogPost = AdminBlog::find($id);
        $blogPost->status = 1;
        $blogPost->save();
        return back();

    }
}
