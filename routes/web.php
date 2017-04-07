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

//If you visit a home page a view called 'welcome' is displayed - views are found in resources

Route::get('contact', 'PagesController@getContact');

Route::get('about', 'PagesController@getAbout');

Route::get('/', 'PagesController@getIndex');

Route::get('blog', 'PagesController@getBlog');

Route::get('admin', 'PagesController@getAdmin');

Route::resource('posts', 'PostController');               
