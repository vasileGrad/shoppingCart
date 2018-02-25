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

