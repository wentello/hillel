<?php

namespace Hillel\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}