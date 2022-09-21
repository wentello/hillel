<?php

namespace Hillel\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function category(){
        return $this->hasMany(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }
}