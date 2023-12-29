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


//新規投稿
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');

//一覧表示
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');

//新規投稿保存
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');

//検索
Route::post('/posts/search', [App\Http\Controllers\PostController::class, 'search'])->name('posts.search');

//検索結果を表示する
Route::get('/posts/search', [App\Http\Controllers\PostController::class, 'searchShow']);

//詳細
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

//詳細編集
Route::get('/posts/{id}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');


//ユーザー一覧
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

//ユーザー検索
Route::post('/users/search', [App\Http\Controllers\UserController::class, 'search'])->name('users.search');

//コメント投稿ルート
Route::get('/show',[App\Http\Controllers\UserController::class, 'create'])->name('comments.create');

//コメント保存ルート
Route::post('/show', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

//プロフィール表示
Route::get('/profile/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('posts.profile');
Route::get('/profile_edit/{id}',[App\Http\Controllers\UserController::class, 'edit'])->name('profile_edit');

//いいね保存処理
Route::get('/posts/{post_id}/likes', [App\Http\Controllers\LikeController::class, 'store'])->name('likes.store');

//いいね削除
Route::get('/likes/{like_id}', [App\Http\Controllers\LikeController::class, 'destroy'])->name('likes.destroy');

//いいね一覧
Route::get('likes', [App\Http\Controllers\LikeController::class, 'index'])->name('likes.index');

use App\Http\Controllers\ChatController;
Route::get('/chat', [App\Http\Controllers\HomeController::class, 'index'])->name('chat.select');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index2'])->name('home');
Route::get('/chat/{receive}', [App\Http\Controllers\ChatController::class, 'index'])->name('chat');
Route::post('/chat/send', [App\Http\Controllers\ChatController::class, 'store'])->name('chatSend');

