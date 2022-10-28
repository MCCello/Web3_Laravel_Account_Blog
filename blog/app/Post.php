<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public static function popular()
    {
        $posts= Post::orderBy('title','desc')->get();
        return $posts;
    }
}
