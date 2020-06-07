<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminBlog extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function blogCat(){
        return $this->hasMany(BlogPostCategory::class,'blog_id');
    }
    public function comment(){
        return $this->hasMany(BlogComment::class,'blog_id');
    }
}
