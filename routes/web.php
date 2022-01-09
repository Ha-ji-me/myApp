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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
//トップページ（ログインユーザー移動できず）
Route::get('/',function(){
    return view('auth.login');
})->middleware('guest');

Route::get('/home', 'HomeController@index')->name('home');

//投稿機能関連
Route::resource('/incident-post', 'IncidentPostController');
//以下７つは上記リソースと同意(URLは'/incident-post'の統一、ルート名は'incident-post.index'などになる)
// Route::get('/post', 'PostController@index')->name('post.index');
// Route::get('/post/create', 'PostController@create')->name('post.create');
// Route::post('/post', 'PostController@store')->name('post.store');
// Route::get('/post/{post}', 'PostController@show')->name('post.show');
// Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
// Route::patch('/post/{post}', 'PostController@update')->name('post.update');
// Route::delete('/post/{post}', 'PostController@destroy')->name('post.destroy');

//コメント機能
Route::post('/incident-post/comment/store','CommentController@store')->name('comment.store');
//自分の投稿のみ
Route::get('/my-post','HomeController@myPost')->name('home.myPost');
//自分のコメント記事のみ
Route::get('/my-comment','HomeController@myComment')->name('home.myComment');
//お問い合わせ関連
Route::get('/contact/create','ContactController@create')->name('contact.create');
Route::post('/contact/store','ContactController@store')->name('contact.store');
//管理者用ユーザー一覧
Route::get('/profile/index','ProfileController@index')->name('profile.index');
