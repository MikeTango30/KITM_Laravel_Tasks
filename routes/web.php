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

Route::get('/', 'HomeController@showTasks');
Route::get('/add-task', 'TaskController@addTask');
Route::post('/store-task', 'TaskController@storeTask');
Route::get('/task/update/form/{task}', 'TaskController@showUpdateTaskForm');
Route::post('/task/update/{task}', 'TaskController@updateTask');
Route::get('/task/delete/{task}', 'TaskController@destroy');

Auth::routes();

