<?php

Route::get('/welcome' , 'PostsController@wel');
Route::get('/' , 'PostsController@index')->name('home');

Route::get('/blade', function () {
    return view('child');
});


Route::get('/posts/{post}' , 'PostsController@show');

Route::get('/create' , 'PostsController@create');
Route::post('/posts' , 'PostsController@store');
//For comments on posts
Route::post('/posts/{post}/comments' , 'CommentsController@store');



//20 AUG
Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');

Route::get('/logout','SessionsController@destroy');
