<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'RideController@index')->name('home');

Route::get('/home', 'RideController@index')->name('home');

Route::group(array('before' => 'csrf'), function(){

	Route::post('/rides/search', 'RideController@searchRides')->name('search-rides');

	});

/*
	Unauthenticated group
*/

Route::group(array('middleware' => 'guest'), function(){

/*
	CSRF protection
*/

Route::group(array('before' => 'csrf'), function(){

	Route::post('/account/sign-in', 'AccountController@postSignIn')->name('account-sign-in-post');

	Route::post('/account/create', 'AccountController@postCreate')->name('account-create-post');

	});

	Route::get('/account/create', 'AccountController@getCreate')->name('account-create');

	Route::get('/account/activate/{code}', 'AccountController@getActivate')->name('account-activate');
});

/*
	Authenticated group
*/

Route::group(array('middleware' => 'auth'), function(){

/*
	CSRF protection
*/

	Route::group(array('before' => 'csrf'), function() {

	Route::post('/stock/stock-post', 'RideController@stockPost')->name('stock-post');

	Route::post('/admin/message-post', 'RideController@message')->name('message-post');

Route::post('/updateuser/{id}',['uses'=>'RideController@update', 'as' => 'update']);
	});

	Route::get('/account/sign-out', 'AccountController@getSignOut')->name('account-sign-out');

	Route::get('/admin', 'RideController@admin')->name('admin');

	Route::get('/my-messages', 'RideController@myMessages')->name('my-messages');

	Route::get('/admin/view-users', 'RideController@viewUsers')->name('view-users');

	Route::get('/stock/list-stock', 'RideController@listStock')->name('list-stock');

	Route::get('/admin/view-message', 'RideController@viewMessage')->name('view-message');

	Route::get('/stock/view-stock', 'RideController@viewStock')->name('view-stock');

	Route::get('/edituser/{id}', 'RideController@edit')->name('edituser');

  Route::get('deleteuser/{id}',['uses'=>'RideController@delete','as' => 'delete']);

	Route::get('deletemessage/{id}',['uses'=>'RideController@deletemessage','as' => 'deletemessage']);
});
