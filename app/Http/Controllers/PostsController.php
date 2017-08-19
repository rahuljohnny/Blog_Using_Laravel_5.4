<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Post;

class PostsController extends Controller
{

    public function create()
    {
        return view('posts.create');
    }

    public function index()
    {
        $posts = Post::latest()->get();

    	return view('posts.index',compact('posts'));
    }



    public function show(Post $post)
    {
        //$posts = DB::table('posts')->get();
        //$Posts = Post::all();

        //$post = Post::find($post);


        //return view('posts.show')->with('posts',$posts);



        return view('posts.show', compact('post'));
        //return view('new',compact('users'));

    }



    public function store()
    {
        //dd(request(['title','body']));
        //Create a new post using the request data
        //$post = new Post;
        //$post->title = request('title');
        //$post->body = request('body');

        $this->validate(request(),[ //It validates if title and body is set properly
            'title' => 'required',
            'body' => 'required'
            ]

        );

        //Save it to the database

        //$post->save();
        Post::create(request(['title','body']));

        //Then redirect to home page



        return redirect('/');
    }


}
