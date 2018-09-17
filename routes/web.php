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

/** Category routes end */

/** Task routes start */

Route::get('/tasks/ongoing','TaskController@index')->name('task.ongoing');
Route::get('/tasks/pending','TaskController@pending')->name('task.pending');
Route::get('/tasks/completed','TaskController@completed')->name('task.completed');

/** Task routes end */

/** Project routes start */

Route::get('/projects/all','ProjectController@index')->name('project.all');
Route::get('/projects/ongoing','ProjectController@ongoing')->name('project.ongoing');
Route::get('/projects/finished','ProjectController@completed')->name('project.finished');

/** Project routes end */