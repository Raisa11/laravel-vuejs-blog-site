<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    public function adminblog(){
        return $this->belongsTo(AdminBlog::class);
    }
}
