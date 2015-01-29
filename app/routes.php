<?php
Route::get('/', 'AuthController@index');

Route::post('/auth', 'AuthController@check');
Route::get('/auth/logout', 'AuthController@logout');

Route::get('/registration', 'RegistrationController@index');
Route::post('/registration', 'RegistrationController@signUp');

Route::group(array('before' => 'auth'), function() {
  Route::get('/user/{user}', 'UserController@showProfile');
  Route::get('/user/{user}/messages', 'UserController@showMessages');
  Route::post('/user/{user}/messages/send', 'UserController@sendMessage');
});

App::missing(function ($exception) {
  return Response::view('missing', array(), 404);
});