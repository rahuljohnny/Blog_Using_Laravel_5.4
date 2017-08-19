<?php

Route::get('/welcome' , 'PostsController@wel');
Route::get('/' , 'PostsController@index');

Route::get('/blade', function () {
    return view('child');
});


Route::get('/posts/{post}' , 'PostsController@show');

Route::get('/create' , 'PostsController@create');
Route::post('/posts' , 'PostsController@store');
//For comments on posts
Route::post('/posts/{post}/comments' , 'CommentsController@store');

