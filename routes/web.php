<?php

// DB::listen(function($query){var_dumb($query->sql,$query->bindings);});
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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


    Route::get('/', function () {
        return view('first_page');
    });
    Route::get('/tweety', function () {
        return view('welcome');
    });
    //Tweet Controllers
    Route::group(['prefix'=>'tweety','middleware' =>['auth']],function () {
        Route::get('/tweets', 'TweetController@index')->name('home');
        Route::post('/tweets', 'TweetController@store')->name('Tweet.store');
        Route::post('/tweets/{tweet}/like', 'TweetLikesController@store')->name('like');
        Route::delete("/tweets/{tweet}/like",'TweetLikesController@destroy')->name('dislike');

        Route::post('/profile/{user}/follow', 'FollowsController@store')->name('follow');
        Route::get('/profile/{user}/edit', 'ProfilesController@edit')->middleware('can:edit,user');
        Route::patch('/profile/{user}', 'ProfilesController@update')->middleware('can:edit,user');
        Route::get('/explore','ExploreController@index')->name('explore');
        Route::get('/profile/{user}', 'ProfilesController@show')->name('profile');


        Route::get('/requests/{user}','ProfilesController@request')->name('request');
        Route::put('/profiles/{id}/request','FollowsController@update')->name('update');
        Route::delete('/profiles/{id}/request','FollowsController@destroy')->name('destroy');


        // Route::get('/messages','MessageController@index')->name('message_index');
        Route::get('/chat/{user}','MessageController@show')->name('message_show');


        Route::post('/users/{id}','MessageController@store')->name('message_store');

    });



// {user:name} use laravel 7

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');//Access the time line
