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

Route::get('/', function () {
    if (Auth::check()) {
        return view('home');
    } else {
        // not logged-in
        return view('welcome');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    //Categories
    Route::get('/category/create', 'CategoryController@create_view');
    Route::post('/category/create', 'CategoryController@create');
    Route::get('/category/delete', 'CategoryController@delete_view');
    Route::post('/category/delete', 'CategoryController@delete');

    //Notes
    Route::get('/note/create','NoteController@create_view');
    Route::post('/note/create','NoteController@create');
    Route::get('/{id}/notes','NoteController@index');
    Route::get('note/{id}','NoteController@display');
    Route::get('note/{id}/edit','NoteController@edit_view');
    Route::get('note/{id}/delete','NoteController@delete');
    Route::post('/note/save','NoteController@save');

    //Links
    Route::post('/link/create','LinkController@create');
    Route::post('/link/delete','LinkController@delete');

});
