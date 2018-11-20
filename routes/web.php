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
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::post('/profile', 'ProfileController@update_avatar');

// Route::get('/days', 'DaysController@index')->name('days');

// Route::get('/home', 'HomeController@index')->name('home');
// Route::post('/addNewTask','HomeController@addTask');

// Route::get('/todo', 'HomeController@index')->name('todo');
// Route::post('addTask','HomeController@addTask')->name('addTask');
// Route::get('/todo', 'ToDoController@index')->name('todo');
// Route::post('/addTask','ToDoController@addTask')->name('addTask');
Route::group(['middleware' => ['web']], function () {
    Route::resource('/todo', 'ToDoController');
    Route::get('/status', 'ToDoController@getByStatus')->name('todo.status');
    Route::resource('/date', 'DateController');
   

//   Route::POST('editPost','PostController@editPost');
    //   Route::POST('deletePost','PostController@deletePost');
});
