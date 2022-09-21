<?php

namespace Hillel\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function orders()
    {
        return $this->belongsToMany(Product::class, 'post_tag');
    }
}