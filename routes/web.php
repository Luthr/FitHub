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

//**** Ask aaron if this is needed
Route::group(['middleware' => ['web']], function () {
  //Authentication routes
  //Route::get('auth/login', 'Auth\LoginController@getLogin');
  //Route::post('auth/login', 'Auth\LoginController@postLogin');
  //Route::get('auth/logout', 'Auth\LoginController@getLogout');
  // Registration routes
  //Route::get('auth/register', 'Auth\RegisterController@getRegister');
  //Route::post('auth/register', 'Auth\RegisterController@postRegister');

  // ie: domain/blog/slug-goes-here
  Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
    ->where('slug', '[\w\d\-\_]+');
  Route::get('contact', 'PagesController@getContact');
  Route::get('about', 'PagesController@getAbout');
  Route::get('/', 'PagesController@getIndex');
  Route::get('blog', ['uses' => 'BlogController@getindex', 'as' => 'blog.index']);
  Route::get('admin', 'PagesController@getAdmin');
  Route::resource('posts', 'PostController');

});

//shortcut for defining auth/reg/reset routes
Auth::routes();
Route::get('/home', 'HomeController@index');
