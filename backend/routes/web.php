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
    return view('welcome');
});

Route::resource('program','ProgramController');

// Route::resource('comment','CommentController');

Route::prefix('program')->name('program.')->group(function(){

Route::put('/{program}/like','LikeController@store')->name('like')->middleware('auth');
Route::delete('/{program}/unlike','LikeController@destroy')->name('unlike')->middleware('auth');

});


Route::prefix('program/{program}')->group(function(){
Route::post('/comment','CommentController@store')->name('comment.store')->middleware('auth');
Route::get('/twitter','TwitterController@index')->name('timeline.index');  
Route::get('/twitter/timeline','TwitterController@getTimeline');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
