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



Route::group(['prefix' => 'vjestine'], function(){
    
    Route::get('/', [
        'uses' => 'VjestineController@getAll',
        'as'   => 'vjestine.getAll'
    ]);

    Route::get('/{id}', [
        'uses' => 'VjestineController@get',
        'as'   => 'vjestine.get'
    ]);


    Route::post('/', [
        'uses' => 'VjestineController@post',
        'as'   => 'vjestine.post'
    ]);


    Route::delete('/{id}', [
        'uses' => 'VjestineController@delete',
        'as'   => 'vjestine.delete'
    ]);

    Route::patch('/{id}', [
        'uses' => 'VjestineController@patch',
        'as'   => 'vjestine.patch'
    ]);
});




Route::group(['prefix' => 'tecajevi'], function(){
    
    Route::get('/', [
        'uses' => 'TecajeviController@getAll',
        'as'   => 'tecajevi.getAll'
    ]);

    Route::get('/{id}', [
        'uses' => 'TecajeviController@get',
        'as'   => 'tecajevi.get'
    ]);


    Route::post('/', [
        'uses' => 'TecajeviController@post',
        'as'   => 'tecajevi.post'
    ]);


    Route::delete('/{id}', [
        'uses' => 'TecajeviController@delete',
        'as'   => 'tecajevi.delete'
    ]);

    Route::patch('/{id}', [
        'uses' => 'TecajeviController@patch',
        'as'   => 'tecajevi.patch'
    ]);
});





Route::group(['prefix' => 'forumi'], function(){
    
    Route::get('/', [
        'uses' => 'ForumiController@getAll',
        'as'   => 'forumi.getAll'
    ]);

    Route::get('/{id}', [
        'uses' => 'ForumiController@get',
        'as'   => 'forumi.get'
    ]);


    Route::post('/', [
        'uses' => 'ForumiController@post',
        'as'   => 'forumi.post'
    ]);


    Route::delete('/{id}', [
        'uses' => 'ForumiController@delete',
        'as'   => 'forumi.delete'
    ]);

    Route::patch('/{id}', [
        'uses' => 'ForumiController@patch',
        'as'   => 'forumi.patch'
    ]);
});





Route::group(['prefix' => 'forum_posts'], function(){
    
    Route::get('/', [
        'uses' => 'ForumPostsController@getAll',
        'as'   => 'forum_posts.getAll'
    ]);

    Route::get('/{id}', [
        'uses' => 'ForumPostsController@get',
        'as'   => 'forum_posts.get'
    ]);


    Route::post('/', [
        'uses' => 'ForumPostsController@post',
        'as'   => 'forum_posts.post'
    ]);


    Route::delete('/{id}', [
        'uses' => 'ForumPostsController@delete',
        'as'   => 'forum_posts.delete'
    ]);

    Route::patch('/{id}', [
        'uses' => 'ForumPostsController@patch',
        'as'   => 'forum_posts.patch'
    ]);
});







Route::group(['prefix' => 'termini'], function(){
    
    Route::get('/', [
        'uses' => 'TerminiController@getAll',
        'as'   => 'termini.getAll'
    ]);

    Route::get('/{id}', [
        'uses' => 'TerminiController@get',
        'as'   => 'termini.get'
    ]);


    Route::post('/', [
        'uses' => 'TerminiController@post',
        'as'   => 'termini.post'
    ]);


    Route::delete('/{id}', [
        'uses' => 'TerminiController@delete',
        'as'   => 'termini.delete'
    ]);

    Route::patch('/{id}', [
        'uses' => 'TerminiController@patch',
        'as'   => 'termini.patch'
    ]);
});

