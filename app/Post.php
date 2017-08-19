<?php

namespace App;


class Post extends Model
{
    //
    //protected $fillable = ['title','body'];
    //protected $guarded = [];

    public function comments()
    {
        return $this->hasMany(Comment::class);
        //return $this->hasMany('App\Comment');
    }

    public function addComment($body) //$body fetched from CommentsController
    {
        //Way no. 2:-
        /*
        Comment::create([
            'body' => request('body'),
            'post_id'=>$this->id
        ]);

        */

        //Way no. 3:-
        //$body = request('body');
        $this->comments()->create(compact('body'));


    }
}
