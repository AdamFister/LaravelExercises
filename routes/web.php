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
});

Route::get('/clock', function () {
    return view('clock');
});

Route::get('/countdown', function () {
    return view('countdown');
});

Route::get('/mindreader', function () {
    return view('mindreader');
});

Route::get('/tictactoe', function () {
    return view('tictactoe');
});

Route::get('/calculator', function () {
    return view('calculator');
});

Route::get('/restaurant', function () {
    return view('restaurant');
});

Route::get('/todo', function () {
    return view('todo');
});

Route::post('new', 'todoController@store');
Route::get('all', 'todoController@index');
Route::get('remaining', 'todoController@remaining');
Route::get('completed', 'todoController@completed');
Route::post('update', 'todoController@update');
Route::post('updatecleared', 'todoController@updatecleared');
