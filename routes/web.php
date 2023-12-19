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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/index', function () {
    return view('index');
});
Route::get('/create', function () {
    return view('create');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/show', function () {
    return view('show');
});
Route::get('/like', function () {
    return view('like');
});
Route::get('/profileedit', function () {
    return view('profileedit');
});
Route::get('/showedit', function () {
    return view('showedit');
});

