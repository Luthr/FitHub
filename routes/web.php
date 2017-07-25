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




    // Authentication Routes...
    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes... removed!

// Password Reset Routes...
//    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
//    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
//    Route::post('password/reset', 'Auth\PasswordController@reset');



    // ie: domain/blog/slug-goes-here
    Route::get('blog', ['uses' => 'BlogController@index', 'as' => 'blog.index']);
    Route::get('blog/{post}', ['as' => 'blog.single', 'uses' => 'BlogController@show'])
        ->where('post', '[\w\d\-\_]+');

    Route::get('contact', 'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');

    Route::get('/', ['uses' => 'PagesController@getindex', 'as' => 'pages.welcome']);

    // Posts/Categorires/Tag Crud
    Route::resource('posts', 'PostController');
    Route::resource('category', 'CategoryController', ['except' => ['create']]);
    Route::resource('tags', 'TagController', ['except' => ['create']]);
    Route::resource('content', 'ContentController');
    //shortcut for defining auth/reg/reset routes
//    Auth::routes();

    Route::put('/update-schedule')->name('schedule.update')->uses('ScheduleController@update')->middleware('auth');
    Route::get('/edit-schedule')->name('schedule.edit')->uses('ScheduleController@edit')->middleware('auth');

    Route::post('/booking')->name('booking.store')->uses('BookingController@store')->middleware('throttle:20,100');
    // middleware "throttle:20,100" means :
    // If submitted more than 20 times in one minute, block that ip for 100 minutes.

});
