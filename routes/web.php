<?php

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::get('/signup', [
    'uses' => 'UserController@getSignUp',
    'as' => 'user.signUp'
]);

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'user.signUp'
]);

Route::get('/signin', [
    'uses' => 'UserController@getSignIn',
    'as' => 'user.signIn'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'user.signIn'
]);

Route::get('/profile', [
    'uses' => 'UserController@getProfile',
    'as' => 'user.profile'
]);