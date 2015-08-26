<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Home
Route::get('/', ['uses' => 'HomeController@GET_index', 'as' => '_home']);

Route::get('/login', ['uses' => 'AuthController@GET_login', 'as' => '_auth.login']);
Route::post('/login', ['uses' => 'AuthController@postLogin', 'as' => '_auth.login.post']);
Route::get('/logout', ['uses' => 'AuthController@getLogout', 'as' => '_auth.logout']);

//-- Authentication Routes --//
Route::get('/admin', ['uses' => 'AdminController@GET_index', 'as' => 'admin']);
// Create User
Route::get(		'/user/list', 			['as' => 'user.list', 					'uses' => 'UserController@GET_listUser']);
Route::get(		'/user/create', 		['as' => 'user.create', 				'uses' => 'UserController@GET_createUserForm']);
Route::post(	'/user/create', 		['as' => 'user.create.post', 			'uses' => 'UserController@POST_createUser']);
Route::get(		'/user/update/{id}', 	['as' => 'user.update', 				'uses' => 'UserController@GET_updateUserForm']);
Route::put(		'/user/update/{id}', 	['as' => 'user.update.put', 			'uses' => 'UserController@PUT_updateUser']);
Route::delete(	'/user/delete/{id}', 	['as' => 'user.delete', 				'uses' => 'UserController@DELETE_deleteUser']);

// Create Group
Route::delete(	'/group/delete/{id}', 	['as' => 'group.delete', 				'uses' => 'GroupController@DELETE_deleteGroup']);
Route::get(		'/group/create', 		['as' => 'group.create', 				'uses' => 'GroupController@GET_createGroupForm']);
Route::post(	'/group/create', 		['as' => 'group.create.post',		 	'uses' => 'GroupController@POST_createGroup']);
Route::get(		'/group/assign', 		['as' => 'group.assign', 				'uses' => 'GroupController@GET_assignGroupForm']);
Route::post(	'/group/assign/{id}', 	['as' => 'group.assign.post', 			'uses' => 'GroupController@POST_assignGroup']);
