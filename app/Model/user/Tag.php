<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany('\App\Model\user\Post', 'post_tags')
            ->latest()
            ->paginate(5);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
