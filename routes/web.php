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
    $total_tasks=App\Tasks::count();
    $pending_tasks=App\Tasks::where('status','pending')->count();
    $completed_tasks=App\Tasks::where('status','completed')->count();
    $total_projects=App\Projects::count();
    $pending_projects=App\Projects::where('status','pending')->count();
    $completed_projects=App\Projects::where('status','completed')->count();
    return view('dashboard',['tasks'=>$total_tasks,'pending_tasks'=>$pending_tasks,
        'completed_tasks'=>$completed_tasks,'projects'=>$total_projects,'pending_projects'=>$pending_projects,
        'completed_projects'=>$completed_projects]);
})->name('dashboard');

/** Category routes start */

Route::get('/categories','CategoryController@index')->name('category.index');
Route::get('/categories/create','CategoryController@create')->name('category.create');
Route::post('/categories/store','CategoryController@store')->name('category.store');
Route::get('/categories/{id}/edit','CategoryController@edit')->name('category.edit');
Route::post('/categories/{id}/update','CategoryController@update')->name('category.update');
Route::delete('/categories/{id}/delete','CategoryController@destroy')->name('category.delete');

/** Category routes end */

/** Task routes start */

Route::get('/tasks/ongoing','TaskController@index')->name('task.ongoing');
Route::get('/tasks/pending','TaskController@pending')->name('task.pending');
Route::get('/tasks/completed','TaskController@completed')->name('task.completed');
Route::get('/tasks/create','TaskController@create')->name('task.create');
Route::post('/tasks/store','TaskController@store')->name('task.store');
Route::get('/tasks/{id}/edit','TaskController@edit')->name('task.edit');
Route::post('/tasks/{id}/update','TaskController@update')->name('task.update');

/** Task routes end */

/** Project routes start */

Route::get('/projects/all','ProjectController@index')->name('project.all');
Route::get('/projects/ongoing','ProjectController@ongoing')->name('project.ongoing');
Route::get('/projects/finished','ProjectController@completed')->name('project.finished');

/** Project routes end */