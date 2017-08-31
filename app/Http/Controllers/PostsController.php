<?php

namespace App\Http\Controllers;
use App\Repositories\Posts;

use Illuminate\Http\Request;

use DB;

use App\Post;

use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
        //If the guests is not logged in,only the index and show function will work
    }


    public function create()
    {
        return view('posts.create');
    }

    public function index(Posts $posts)
    {
        $posts = $posts->all();
        /* moved to Post
        if($month = request('month'))
        {
            $posts->whereMonth('created_at',Carbon::parse($month)->month);
        }

        if($year = request('year'))
        {
            $posts->whereYear('created_at',$year);
        }
        */
        //$posts = $posts->get();

        //Temporary
        //$archives = Post::archives();

    	return view('posts.index',compact('posts'));
    }



    public function show(Post $post)
    {

        /* Other approaches

        //$posts = DB::table('posts')->get();
        //$Posts = Post::all();

        //$post = Post::find($post);


        //return view('posts.show')->with('posts',$posts);

        */



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
            'body' => 'required',
            //'user_id' => auth()->id()

        ]);

        //Save it to the database

        //$post->save();
        /*
         *
         *
        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->id();

        $post->save();
         */

        auth()->user()->publish(
            new Post(request(['title','body']))  //to publish a post from a specific user
        );

      



        //Then redirect to home page
        return redirect('/');
    }


}
