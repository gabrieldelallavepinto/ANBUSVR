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
    return view('welcome');
})->name('welcome');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::Resource('project', 'ProjectController');

Route::get('/gaze/export', 'GazeController@export')->name('gaze.export');
Route::get('/grab/export', 'GrabController@export')->name('grab.export');
