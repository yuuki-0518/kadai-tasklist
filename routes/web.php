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

// Route::get('/', 'TasksController@index');
Route::resource('tasks', 'TasksController');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('welcome', 'TasksController@index');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('tasks', 'TasksController', ['only' => ['store', 'destroy']]);
});
// Route::get('/', function () {
//     return view('welcome');
// });

// // CRUD
// // メッセージの個別詳細ページ表示
// Route::get('Tasks/{id}', 'TasksController@show');
// // メッセージの新規登録を処理（新規登録画面を表示するためのものではありません）
// Route::post('Tasks', 'TasksController@store');
// // メッセージの更新処理（編集画面を表示するためのものではありません）
// Route::put('Tasks/{id}', 'TasksController@update');
// // メッセージを削除
// Route::delete('Tasks/{id}', 'TasksController@destroy');

// // index: showの補助ページ
// Route::get('Tasks', 'TasksController@index')->name('Tasks.index');
// // create: 新規作成用のフォームページ
// Route::get('Tasks/create', 'TasksController@create')->name('Tasks.create');
// // edit: 更新用のフォームページ
// Route::get('Tasks/{id}/edit', 'TasksController@edit')->name('Tasks.edit');
