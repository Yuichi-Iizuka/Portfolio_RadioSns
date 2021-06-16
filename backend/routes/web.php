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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 番組の作成関連のルート、ただしログイン済みの場合のみ
Route::resource('program','ProgramController')->except('index');

// Route::resource('comment','CommentController');

// 番組一覧ページ
Route::get('/program','ProgramController@index')->name('program.index');


Route::prefix('program')->name('program.')->group(function(){
// 番組の詳細ページ
// Route::get('/{program}','ProgramController@show')->name('show');
// いいね機能
Route::put('/{program}/like','LikeController@store')->name('like')->middleware('auth');
Route::delete('/{program}/unlike','LikeController@destroy')->name('unlike')->middleware('auth');

});


Route::prefix('program/{program}')->group(function(){
// コメント投稿機能
Route::post('/comment','CommentController@store')->name('comment.store')->middleware('auth');
// コメント削除機能
Route::delete('/comment/destroy','CommentController@destroy')->name('comment.destroy');
// 番組の経過時間などの表示ページ
Route::get('/twitter','TwitterController@index')->name('timeline.index');  
// 経過時間に合わせたTweet取得機能
Route::get('/twitter/timeline','TwitterController@getTimeline');
});
// ユーザーの新規投稿、ログイン、ログアウト機能
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// マイページ
Route::prefix('mypage')->name('mypage.')->group(function(){
// 自分が作成した番組を一覧で表示するページ
Route::get('/user','MypageController@index')->name('user');
// 自分がいいねした番組を一覧で表示するページ
Route::get('/like','MypageController@showLike')->name('like');
});

// Googleログイン
Route::prefix('login')->name('login.')->group(function(){
    Route::get('/{provider}','Auth\LoginController@redirectToProvider')->name('{provider}');
    Route::get('/{provider}/callback','Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});

Route::prefix('register')->name('register.')->group(function(){
    Route::get('/{provider}','Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
    Route::post('/{provider}','Auth\RegisterController@registerProviderUser')->name('{provider}');
});
