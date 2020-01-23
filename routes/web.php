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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('api/user', 'App\Http\Controllers\Api\UserController@index');
// Route::get('api/user/{id}', 'App\Http\Controllers\Api\UserController@show');

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => 'admin',
], function () { // custom admin routes

	Route::prefix('item_request')->group(function(){

		// Route::get('/', 'Admin\ItemRequestController@index')->name('item_request.index');
		Route::get('create', 'Admin\ItemRequestController@create')->name('item_request.create');
		Route::get('create/dept', 'Admin\ItemRequestController@dept');
		Route::post('store', 'Admin\ItemRequestController@store')->name('item_request.store');
		// Route::post('storeitem', 'Admin\ItemRequestController@storeitem')->name('item_list.store');
	});

}); // this should be the absolute last line of this file


