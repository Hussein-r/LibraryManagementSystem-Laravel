<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sort/{sort_value}', 'HomeController@sort');
Route::post('/search', 'HomeController@search');
Route::resource('user', 'UserController');
Route::resource('book', 'BooksController');
Route::resource('category', 'CategoriesController');
Route::resource('lease', 'LeasesController');




// hajar

Route::view('managerHome','managers.managerHome');

Route::view('managerList','managers.managerList');
Route::get('managers', 'managerController@index');

Route::view('userList','managers.userList');

Route::view('managerProfile','managers.managerProfile');
Route::get('managers/{manager}/edit', 'managerController@edit');
Route::patch('managers/{manager}', 'managerController@update');




Route::get('/category/{category}', 'HomeController@category');
