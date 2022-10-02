<?php

namespace Hillel\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function postsTags()
    {
        return $this->hasManyThrough(PostTag::class, Post::class);
//        return $this->hasMany('post_tag');
    }
}