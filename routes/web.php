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

Route::get('/welcome','WelcomeController@welcome');

Auth::routes();
//トップページ（ログインユーザーは移動できない)->herokuでエラー、コントローラーを使う必要あり
// Route::get('/',function(){
//     return view('auth.login');
// })->middleware('guest');
//上記を変更
Route::get('/', 'HomeController@login')->middleware('guest');

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
//プロフィール編集
Route::get('/profile/{user}','ProfileController@edit')->name('profile.edit');
Route::put('/profile/{user}','ProfileController@update')->name('profile.update');
//管理者 ->herokuエラー。クロージャーは使えないため、上記記述を変更
// Route::middleware(['can:admin'])->group(function(){
//     Route::get('/profile/index', 'ProfileController@index')->name('profile.index');
//     Route::delete('/profile/delete/{user}', 'ProfileController@delete')->name('profile.delete');
//     Route::put('/roles/{user}/attach', 'RoleController@attach')->name('role.attach');
//     Route::put('/roles/{user}/detach', 'RoleController@detach')->name('role.detach');
// });
Route::get('/profile/index', 'ProfileController@index')->name('profile.index')->middleware(['can:admin']);
Route::delete('/profile/delete/{user}', 'ProfileController@delete')->name('profile.delete')->middleware(['can:admin']);
Route::put('/roles/{user}/attach', 'RoleController@attach')->name('role.attach')->middleware(['can:admin']);
Route::put('/roles/{user}/detach', 'RoleController@detach')->name('role.detach')->middleware(['can:admin']);
//お気に入り機能
Route::get('/reply/favorite/{incidentPost}', 'FavoriteController@favorite')->name('favorite');
Route::get('/reply/unfavorite/{incidentPost}', 'FavoriteController@unfavorite')->name('unfavorite');
Route::get('/my-favorite','HomeController@myFavorite')->name('home.myFavorite');
//Todo関連
Route::get('/todo-post','TodoPostController@index')->name('todo-post.index');
Route::get('/todo-post/create','TodoPostController@create')->name('todo-post.create');
Route::post('/todo-post/store','TodoPostController@store')->name('todo-post.store');
// Route::post('/todo-post/update','TodoPostController@update')->name('todo-post.update');
//自分のTodoのみ
Route::get('/my-todo','TodoPostController@myTodo')->name('todo-post.myPost');
//Todo完了機能
Route::get('/reply/complete/{todoPost}', 'CompleteTodoController@completeTodo')->name('complete');
Route::get('/reply/uncomplete/{todoPost}', 'CompleteTodoController@unCompleteTodo')->name('uncomplete');

