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
    return view('dashboard');
})->name('dashboard');

/** Category routes start */

Route::get('/categories','CategoryController@index')->name('category.index');

/** Category routes end */

/** Task routes start */

Route::get('/tasks/ongoing','TaskController@index')->name('task.ongoing');

/** Task routes end */