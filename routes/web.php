<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

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

// 既存のRoute
Route::get('/', function () {return view('welcome');});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//新規投稿
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');

//一覧表示
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');

//新規投稿保存
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');


// いいねを作成
Route::get('/posts/{post_id}/likes', [App\Http\Controllers\LikeController::class, 'store']);

// いいねを取り消す
Route::get('/likes/{like_id}', [App\Http\Controllers\LikeController::class, 'destroy']);


//詳細
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

//詳細編集
Route::get('/posts/{id}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');

//検索
Route::post('/posts/search', [App\Http\Controllers\PostController::class, 'search'])->name('posts.search');

//ユーザー一覧
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');




//ゆうやが書いたRoute
// Route::get('/index', function () {
//     return view('index');
// });
// Route::get('/create', function () {
//     return view('create');
// });
// Route::get('/profile', function () {
//     return view('profile');
// });
// Route::get('/show', function () {
//     return view('show');
// });
// Route::get('/like', function () {
//     return view('like');
// });
// Route::get('/posts/search', function () {
//     return view('posts.search');
// });
// Route::get('/profileedit', function () {
//     return view('profileedit');
// });
// Route::get('/showedit', function () {
//     return view('showedit');
// });

