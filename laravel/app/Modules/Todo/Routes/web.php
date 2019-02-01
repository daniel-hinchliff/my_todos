<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'todo'], function () {
    Route::get('/', 'TodoController@index');
    Route::get('/create', 'TodoController@create');
    Route::get('/{id}', 'TodoController@edit');
    Route::post('/{id}', 'TodoController@editSubmit')->name('todo_edit');
    Route::post('/', 'TodoController@createSubmit')->name('todo_create');
    Route::post('/{id}/delete', 'TodoController@delete')->name('todo_delete');
});
