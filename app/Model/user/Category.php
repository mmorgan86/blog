<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Model\user\Post', 'category_posts')
            ->latest()
            ->paginate(5);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
