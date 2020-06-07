<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPostCategory extends Model
{
    public function adminblog(){
        return $this->belongsTo(AdminBlog::class,'blog_id');

    }

    public function admincategory(){
        return $this->belongsTo(AdminCategory::class,'cat_id');
    }
}
