<?php

namespace App;

use Carbon\Carbon;

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

    public function user() //A post is created by an user
    {
        return $this->belongsTo(User::class);//post that belongs to an user
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

    public function scopeFilter($query, $filters)
    {

        if ($month = $filters['month']){
            $query->whereMonth('created_at',Carbon::parse($month)->month);
        }


        if($year = $filters['year'])
        {
            $query->whereYear('created_at',$year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year,monthname(created_at)month,
                    
                    count(*) published')

            ->groupBy('year','month')

            ->orderByRaw('min(created_at) DESC')

            ->get()->toArray();
    }
}
