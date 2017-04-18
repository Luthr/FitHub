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


Route::group(['middleware' => ['web']], function () {

    // ie: domain/blog/slug-goes-here
    Route::get('blog', ['uses' => 'BlogController@index', 'as' => 'blog.index']);
    Route::get('blog/{post}', ['as' => 'blog.single', 'uses' => 'BlogController@show'])
        ->where('post', '[\w\d\-\_]+');

    Route::get('contact', 'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');

    Route::get('about', 'PagesController@getAbout');
    Route::get('/', ['uses' => 'PagesController@getindex', 'as' => 'pages.welcome']);

    // Posts/Categorires/Tag Crud
    Route::resource('posts', 'PostController');
    Route::resource('category', 'CategoryController', ['except' => ['create']]);
    Route::resource('tags', 'TagController', ['except' => ['create']]);
    Route::resource('content', 'ContentController');
    //shortcut for defining auth/reg/reset routes
    Auth::routes();

});
