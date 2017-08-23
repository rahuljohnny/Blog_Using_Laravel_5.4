<?php

namespace App;

use Illuminate\Hashing\BcryptHasher;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);//TODO: This denotes that user can have many posts,it supports the 19th tut(It was created in laracast 18th tut)
    }

    public function publish(Post $post) //TODO: A user can publish a post 
    {
        $this->posts()->save($post); //TODO: As we have access to the posts,we only need to save a new post to database,nothing more


        /* another approach of saving post,but it didn't work for me

          Post::create(request
        ([
                'title' => request('title'),
                'body' => request('body'),
                'user_id' => auth()->id()
        ]));

        */

    }


}
