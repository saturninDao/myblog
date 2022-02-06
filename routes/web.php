<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::redirect('','/home');

Route::get('home',[MainController::class,'home'])->name('articles');

Route::get('articles/{slug}',[MainController::class,'show'])->name('article');

Route::get('admin/articles',[ArticleController::class,'index'])->middleware('admin')->name('admin.index');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
