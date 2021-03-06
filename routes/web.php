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

// 新規登録画面
Route::get('signup', function () {
    return view('signup');
});

// ログイン画面
Route::get('login', function () {
    return view('login');
});

// 超勤時間記録画面
Route::get('record', function () {
    return view('worktime-record');
});

// 超勤状況確認ページ
Route::get('workstatus', function () {
    return view('workstatus');
});

// プロフィール編集画面
Route::get('profile', function () {
    return view('profile-edit');
});

// パスワード編集画面
Route::get('password', function () {
    return view('profile-pass');
});

// 認証系画面
Auth::routes();

// ホームページ
Route::get('/home', 'HomeController@index')->name('home');

// プロフィール編集画面
Route::get('/profile/edit', 'UsersController@edit')->name('profile-edit');

// プロフィールの更新
Route::post('/profile/edit', 'UsersController@update')->name('profile-update');

// パスワードの編集画面
Route::get('/password/edit', 'UsersController@editPassword')->name('password-edit');

// パスワードの更新
Route::post('/password/edit', 'UsersController@updatePassword')->name('password-update');


// 超勤記録画面
Route::get('/worktime/record', 'WorktimeRecordsController@show')->name('worktime-record');

// 超勤内容の登録
Route::post('/worktime/record', 'WorktimeRecordsController@record')->name('worktime-record_request');

// 超勤一覧を表示
Route::get('/workstatus/mypage', 'WorkStatusController@show')->name('workstatus-mypage');

// 超勤記録内容の編集
Route::get('/workstatus/{id}/edit', 'WorkStatusController@edit')->name('worktime-edit');

// 超勤記録内容の更新
Route::post('/workstatus/{id}', 'WorkStatusController@update')->name('worktime-update');

// 超勤記録内容の削除
Route::post('/workstatus/{id}/delete', 'WorkStatusController@destroy')->name('worktime-delete');