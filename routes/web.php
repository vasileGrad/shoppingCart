<?php

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index' // this is the name
]);

Route::get('/addToCart/{id}', [
	'uses' => 'ProductController@getAddToCart',
	'as' => 'product.addToCart'
]);

Route::get('/shoppingCart', [
	'uses' => 'ProductController@getCart',
	'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
	'uses' => 'ProductController@getCheckout', // getCheckout action in the Controller
	'as' => 'checkout' // this is the name
]);

Route::post('/checkout', [
	'uses' => 'ProductController@postCheckout', 
	'as' => 'checkout' // this is the name
]);

Route::group(['prefix' => 'user'], function() {
	Route::group(['middleware' => 'guest'], function() {
		Route::get('/signup', [
		    'uses' => 'UserController@getSignUp',
		    'as' => 'user.signUp'/*,
		    'middleware' => 'guest' // only unauthenticated users can sign Up*/
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
	});

	Route::group(['middleware' => 'auth'], function() {
		Route::get('/profile', [
		    'uses' => 'UserController@getProfile',
		    'as' => 'user.profile'/*,
		    'middleware' => 'auth' // only unauthenticated users can sign Up*/
		]);

		Route::get('/logout', [
		    'uses' => 'UserController@getLogout',
		    'as' => 'user.logout'
		]);
	});

});
