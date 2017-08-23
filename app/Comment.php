<?php
namespace App;

class Comment extends Model
{
    //
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user() //$body fetched from CommentsController
    {
        return $this->belongsTo(User::class);
    }

}