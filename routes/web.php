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

Route::get('/home', 'HomeController@index')->name('home')->middleware('USER');
Route::get('/latestSort/{sort}', 'HomeController@sort');
Route::get('/search', 'HomeController@search');
Route::resource('user', 'UserController')->middleware('USER');


Route::resource('book', 'BooksController')->middleware('MANAGER');
Route::resource('category', 'CategoriesController')->middleware('MANAGER');
Route::resource('lease', 'LeasesController')->middleware('USER');
Route::get('/fav','FavouriteController@storeOrUpdate');

Route::get('/my_books/{id}', 'UserController@my_books')->middleware('USER');
Route::get('/my_favorite/{id}', 'UserController@my_favorite')->middleware('USER');


// hajar

//delete user
Route::delete('manager/{user}','managerController@destroy');

// edit profile data
Route::get('managerHome','managerController@show');
Route::get('managers/{manager}/edit', 'managerController@edit');
Route::patch('managers/{manager}', 'managerController@update');

//list managers
// Route::view('managerList','managers.managerList');
Route::get('managers', 'managerController@index')->middleware('MANAGER');

//manager profile page
Route::get('manager/managerPage', 'managerController@profile');
// delete manager
Route::delete('/managers/{manager}', 'managerController@destroy');
//unpromote manager
Route::patch('managers/unpromote/{manager}', 'managerController@unpromote');





//list users
// Route::view('userList','managers.userList');
Route::get('userList', 'userManageController@index')->middleware('MANAGER');
// delete manager
Route::delete('/userList/{user}', 'userManageController@destroy');
//promote user
Route::patch('userList/{user}', 'userManageController@promote');
//inactivate user
Route::patch('userList/inactivate/{user}', 'userManageController@inactivate');
//activate user
Route::patch('userList/activate/{user}', 'userManageController@activate');
//charts
Route::get('chart', 'ChartController@index')->middleware('MANAGER');


// Route::view('managerProfile','managers.managerProfile');



Route::view('managerProfile','managers.managerProfile');

//edit dataaaaa
Route::get('managers/{manager}/edit', 'managerController@edit')->middleware('MANAGER');

Route::patch('managers/{manager}', 'managerController@update');


//ERRORRRR PAGE
Route::view('error', 'managers.error');





// ---------------------

Route::get('/showprofile/{book}','BooksController@showProfile');
Route::get('/category/{category}', 'HomeController@category');
Route::resource('comment', 'CommentsController');
Route::resource('rate', 'RatesController');
Route::get('/rateSort', 'RatesController@sort');