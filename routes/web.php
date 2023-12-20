<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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


Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::post('/posts/search', [App\Http\Controllers\PostController::class, 'search'])->name('posts.search');
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::post('/users/search', [App\Http\Controllers\UserController::class, 'search'])->name('users.search');




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
// Route::get('/search', function () {
//     return view('search');
// });
// Route::get('/profileedit', function () {
//     return view('profileedit');
// });
// Route::get('/showedit', function () {
//     return view('showedit');
// });

