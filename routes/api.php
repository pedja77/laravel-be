<?php


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

// Public routes
Route::post('/login', 'Auth\LoginController@authenticate');

// Private - require authentication routes
Route::group(['middleware' => 'jwt.auth'], function ($router) {
    Route::get('/contacts', 'ContactController@index');
    Route::post('/contacts', 'ContactController@store');
    Route::get('/contacts/{id}', 'ContactController@show');
    Route::put('/contacts/{id}', 'ContactController@update');
    Route::delete('/contacts/{id}', 'ContactController@destroy');
});
