<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::group([
    'namespace' => 'Admin',
    'middleware' => ['auth'],
    'prefix' => 'ctrl'
], function() {

    Route::get('/dashboard', 'Dashboard@index');

    Route::get('/me', 'User@profile');
    Route::post('/me', 'User@profileUpdate');

    Route::get('/users', 'User@index');
    Route::post('/users', 'User@create');
    Route::post('/users/{id}', 'User@save');
    Route::get('/users/{id}/delete', 'User@delete');

    Route::get('/areas', 'Area@index');
    Route::post('/areas', 'Area@save');
    Route::get('/areas/{id}', 'Area@form');
    Route::get('/areas/{id}/info', 'Area@formInfo');
    Route::get('/areas/{id}/statuses', 'Area@formStatus');
    Route::post('/areas/{id}', 'Area@save');
    Route::post('/areas/{id}/statuses', 'Area@saveStatus');
    Route::get('/areas/{id}/statuses/{statusId}', 'Area@formStatus');
    Route::post('/areas/{id}/statuses/{statusId}', 'Area@saveStatus');
    Route::get('/areas/{id}/delete', 'Area@delete');
    Route::get('/areas/{id}/statuses/{statusId}/delete', 'Area@deleteStatus');

    Route::get('/information', 'Information@index');
    Route::post('/information/store', 'Information@store');
    Route::get('/information/{id}/delete', 'Information@delete');
	
    Route::get('/necessary', 'Necessary@index');
    Route::get('/necessary/{id}', 'Necessary@form');

    Route::resource('/posko', 'Posko');
});
