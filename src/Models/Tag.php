<?php

namespace Hillel\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }

    public function postTag()
    {
        return $this->belongsToMany(Post::class,'post_tag');
    }
}