<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminCategory extends Model
{
    protected $fillable = [
        'cat_name', 'cat_desc'
    ];
    public function blogCat(){
        return $this->hasMany(BlogPostCategory::class,'cat_id');
    }
}
