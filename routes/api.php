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
Route::get('images/{name}', function ($name) {
    return response()->file(storage_path('app/public/images/'.$name));
});

Route::group(['prefix' => 'dogs'], function () {
    Route::post('filter', 'DogController@filter');
    Route::get('details/{dogID}', 'DogController@one');
    Route::post('add', 'DogController@store');
    Route::get('list', 'DogController@index');
});