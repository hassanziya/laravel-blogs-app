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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    // The route we have created to show all blog posts.
    Route::get('/blog', 'BlogPostController@index')->name('Blog.index');
    Route::get('/blog/{blogPost}', 'BlogPostController@show')->name('Blog.show');
    Route::get('/blog/create/post', 'BlogPostController@create')->name('Blog.create')->middleware('auth');
    Route::post('/blog/create/post', 'BlogPostController@store')->name('Blog.store');
    Route::get('/blog/{blogPost}/edit', 'BlogPostController@edit')->name('Blog.edit');
    Route::put('/blog/{blogPost}/edit', 'BlogPostController@update')->name('Blog.update');
    Route::delete('/blog/{blogPost}', 'BlogPostController@destroy')->name('Blog.destroy');
    Route::post('/comment/{blogPostId}/{parentCommentId}/reply', 'CommentController@store')->name('comment.reply')->middleware('auth');


    Route::post('/blog/{blogPostId}/comments', 'CommentController@store')
    ->name('comments.store')
    ->middleware('auth');

    

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Blogs Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});