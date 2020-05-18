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
Route::get('/search', 'HomeController@search');
Route::resource('user', 'UserController');
Route::resource('book', 'BooksController');
Route::resource('category', 'CategoriesController');
Route::resource('lease', 'LeasesController');
Route::get('/fav','FavouriteController@storeOrUpdate');

Route::get('/my_books/{id}', 'UserController@my_books');
Route::get('/my_favorite/{id}', 'UserController@my_favorite');


// hajar
Route::delete('manager/{user}','managerController@destroy');

//show graph and edit data
Route::get('managerHome','managerController@show');
Route::get('managers/{manager}/edit', 'managerController@edit');
Route::patch('managers/{manager}', 'managerController@update');

//list managers
// Route::view('managerList','managers.managerList');
Route::get('managers', 'managerController@index');
// delete manager
Route::delete('/managers/{manager}', 'managerController@destroy');
//unpromote manager
Route::patch('managers/{manager}', 'managerController@unpromote');





//list users
// Route::view('userList','managers.userList');
Route::get('userList', 'userManageController@index');
// delete manager
Route::delete('/userList/{user}', 'userManageController@destroy');
//promote user
Route::patch('userList/{user}', 'userManageController@promote');
//inactivate user
Route::patch('userList/inactivate/{user}', 'userManageController@inactivate');
//activate user
Route::patch('userList/activate/{user}', 'userManageController@activate');
//charts
Route::get('chart', 'ChartController@index');

// Route::view('managerProfile','managers.managerProfile');



Route::view('managerProfile','managers.managerProfile');

//edit dataaaaa
Route::get('managers/{manager}/edit', 'managerController@edit');

Route::patch('managers/{manager}', 'managerController@update');







// ---------------------

Route::get('/showprofile/{book}','BooksController@showProfile');
Route::get('/category/{category}', 'HomeController@category');
