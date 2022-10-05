<?php

namespace Hillel\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = 'post_tag';

    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_tag');
    }
}