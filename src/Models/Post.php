<?php

namespace Hillel\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public function orders()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
}