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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/','HomeController@index');
Route::get('home/view/{id}','HomeController@singleview');


// About Routing
Route::get('about','AboutController@index');
// For Category Route
Route::get('view/category','CategorisController@index')->name('category');
Route::get('create/category','CategorisController@create');
Route::post('/store/category','CategorisController@store');
Route::get('single/view/{id}','CategorisController@singleview');
Route::get('delete/category/{id}','CategorisController@destroy');
Route::get('edit/category/{id}','CategorisController@edit');
Route::post('update/category/{id}','CategorisController@update');
// post
Route::get('/add/post','PostsController@create');
Route::post('/store/post','PostsController@store');
Route::get('/view/post','PostsController@index');
Route::get('single/post/{id}','PostsController@singleView');
Route::get('delete/post/{id}','PostsController@destroy');
Route::get('edit/post/{id}','PostsController@edit');
Route::post('update/post/{id}','PostsController@update');

// Contact Routing
Route::get('contact','ContactController@index')->name('contact');
