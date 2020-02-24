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
    Route::post('/IsEmailTaken', [
        'uses' => 'UserController@isEmailTaken',
        'as'   => 'users.isEmailTaken'
    ]);
    
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
        'uses' => 'UserController@patch',
        'as'   => 'users.patch'
    ]);


    Route::post('/login', [
        'uses' => 'UserController@login',
        'as'   => 'users.login'
    ]);
});




Route::group(['prefix' => 'ucionice'], function(){
    
    Route::get('/', [
        'uses' => 'UcioniceController@getAll',
        'as'   => 'ucionice.getAll'
    ]);

    Route::get('/{id}', [
        'uses' => 'UcioniceController@get',
        'as'   => 'ucionice.get'
    ]);


    Route::post('/', [
        'uses' => 'UcioniceController@post',
        'as'   => 'ucionice.post'
    ]);


    Route::delete('/{id}', [
        'uses' => 'UcioniceController@delete',
        'as'   => 'ucionice.delete'
    ]);

    Route::patch('/{id}', [
        'uses' => 'UcioniceController@patch',
        'as'   => 'ucionice.patch'
    ]);
    
});






Route::group(['prefix' => 'tipovi-nastave'], function(){
    
    Route::get('/', [
        'uses' => 'TipoviNastaveController@getAll',
        'as'   => 'tipovi-nastave.getAll'
    ]);

    Route::get('/{id}', [
        'uses' => 'TipoviNastaveController@get',
        'as'   => 'tipovi-nastave.get'
    ]);


    Route::post('/', [
        'uses' => 'TipoviNastaveController@post',
        'as'   => 'tipovi-nastave.post'
    ]);


    Route::delete('/{id}', [
        'uses' => 'TipoviNastaveController@delete',
        'as'   => 'tipovi-nastave.delete'
    ]);

    Route::patch('/{id}', [
        'uses' => 'TipoviNastaveController@patch',
        'as'   => 'tipovi-nastave.patch'
    ]);
    
});







Route::group(['prefix' => 'razine-nastave'], function(){
    
    Route::get('/', [
        'uses' => 'RazineNastaveController@getAll',
        'as'   => 'razine-nastave.getAll'
    ]);

    Route::get('/{id}', [
        'uses' => 'RazineNastaveController@get',
        'as'   => 'razine-nastave.get'
    ]);


    Route::post('/', [
        'uses' => 'RazineNastaveController@post',
        'as'   => 'razine-nastave.post'
    ]);


    Route::delete('/{id}', [
        'uses' => 'RazineNastaveController@delete',
        'as'   => 'razine-nastave.delete'
    ]);

    Route::patch('/{id}', [
        'uses' => 'RazineNastaveController@patch',
        'as'   => 'razine-nastave.patch'
    ]);
});
