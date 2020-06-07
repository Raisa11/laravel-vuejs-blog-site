<?php

namespace App\Http\Controllers;

use App\AdminBlog;
use App\AdminCategory;
use App\BlogComment;
use App\BlogPostCategory;
use Illuminate\Http\Request;



class BlogController extends Controller
{
    public function getAllBlog(){
        $post = AdminBlog::with('user','blogCat.admincategory')->get();
        return response()->json([
            'post' => $post
        ], 200);
    }
    public function getSingleBlog($id){
        $posts = AdminBlog::with('user','blogCat.admincategory','comment')->find($id);
        return response()->json([
            'posts' => $posts
        ], 200);
    }
    public function allCategories(){
        $categories = AdminCategory::all();
        return response()->json([
            'categories' => $categories
        ],200);

    }
    public function getCategoryBlogs($id){
        $catBlogs = BlogPostCategory::with('adminblog','admincategory')
            ->where('cat_id',$id)
            ->get();

       return response()->json([
            'catBlogs' => $catBlogs
      ],200);


    }
//    public function getSingleCat($id){
//        $cat = AdminBlog::with('user','blogCat.admincategory','comment')->find($id);
//       return response()->json([
//          'cat' => $cat
//        ], 200);
//
//    }

    public function searchBlog(){
        $search = \Request::get('keyword');
        $post = AdminBlog::with('user','blogCat.admincategory')
            ->where('title','LIKE',"%$search%")
            ->orwhere('short_desc','LIKE',"%$search%")
            ->orwhere('author','LIKE',"%$search%")
            ->get();


     return response()->json([
        'post' => $post
     ], 200);

    }
    public function addComment(Request $request){
     $comment = new BlogComment();
     $comment->blog_id = $request->blog_id;
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->save();
        return ['message'=>'ok'];

    }
    public function addReply(Request $request){
        return ['message'=>'ok'];
    }
}
