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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'users'], function(){
    
    Route::get('/predavaci', [
        'uses' => 'UserController@getPredavaci',
        'as'   => 'users.getPredavaci'
    ]);

    Route::get('/ucenici', [
        'uses' => 'UserController@getUcenici',
        'as'   => 'users.getUcenici'
    ]);

    Route::get('/', [
        'uses' => 'UserController@getAll',
        'as'   => 'users.getAll'
    ]);

    Route::get('/{id}', [
        'uses' => 'UserController@get',
        'as'   => 'users.get'
    ]);


    Route::post('/', [
        'uses' => 'UserController@post',
        'as'   => 'users.post'
    ]);


    Route::delete('/{id}', [
        'uses' => 'UserController@delete',
        'as'   => 'users.delete'
    ]);

    Route::patch('/{id}', [
        'uses' => 'UserController@put',
        'as'   => 'users.put'
    ]);


    Route::post('/login', [
        'uses' => 'UserController@login',
        'as'   => 'users.login'
    ]);
});

