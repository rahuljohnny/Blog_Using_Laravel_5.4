<?php

namespace App\Http\Controllers;

use App\Post;  //As it has used Post Cntrlr in line 11,so including it
use App\Comment; //As it has used Comment Cntrlr in line 13

class CommentsController extends Controller
{
    //
    public function store(Post $post)
    {
        $this->validate(request(),['body' => 'required|min:2']);
        $post->addComment(request('body'));//This addComment function is declared in Post Model

        return back();

    }
}
