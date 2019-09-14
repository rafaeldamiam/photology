<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@home');

Route::get('/posts','PostsController@index')->name('perfil');

Route::get('/posts/create','PostsController@create');

Route::post('/posts','PostsController@store');

Route::resource('notifications', 'NotificationController');

Route::get('/like/{idPost}','PostsController@like')->name('like');

Route::get('/unlike/{idPost}','PostsController@unlike')->name('unlike');

Route::post('/comments', 'PostsController@comments')->name('comments');

Route::get('/uncomments/{comment_id}', 'PostsController@uncomments')->name('uncomments');