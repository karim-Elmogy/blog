<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route for Posts
Route::group(['prefix' => 'posts','middleware'=>'auth'],function () {
    Route::get('/','PostController@index')->name('posts');
    Route::get('/create','PostController@create')->name('post.create');
    Route::post('/store','PostController@store')->name('post.store');
    Route::get('/edit/{id}','PostController@edit')->name('post.edit');
    Route::put('/update/{id}','PostController@update')->name('post.update');
    Route::get('/destroy/{id}','PostController@destroy')->name('post.destroy');


    Route::get('/hdelete/{id}', 'PostController@hdelete')->name('post.hdelete');
    Route::get('/restore/{id}', 'PostController@restore')->name('post.restore');

    Route::get('/trashed','PostController@postsTrashed')->name('posts.trashed');

});


//Route for Comments
Route::group(['prefix' => 'comments','middleware'=>'auth'],function () {
    Route::get('/','CommentController@index')->name('comments');
    Route::get('/create','CommentController@create')->name('comment.create');
    Route::post('/store/comment','CommentController@store')->name('comment.store');
    Route::get('comment/destroy/{id}','CommentController@destroy')->name('comment.destroy');
});
