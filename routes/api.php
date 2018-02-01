<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'Auth\RegisterController@create');

Route::post('/login', 'Auth\LoginController@login');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:api']], function(){
	// Route::resource('/users', 'UserController', ['only' => [
	// 	'update'
	// ]]);
	//--------------USER ROUTES---------------------
	Route::get('/user', 'UserController@show');
	Route::get('/user/{id}/deactivate/', 'UserController@deactivate');
	
	//--------------POST ROUTES---------------------
	Route::resource('/posts', 'PostController');
	Route::get('/hive_posts', 'PostController@getHivePosts');	

	Route::get('/logout', 'Auth\LoginController@logout');
});

