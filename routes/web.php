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


Auth::routes();



Route::prefix('admin')->middleware('admin')->group(
    function (){
/*
        Route::get('/articles',[ArticleController::class,'index'])->name('admin.index');

        Route::get('/articles/new', [ArticleController::class,'create'])->name('admin.new');

        Route::post('/articles/store',[ArticleController::class,'store'])->name('admin.store');

        Route::delete('/articles/{article}/delete',[ArticleController::class,'destroy'])->name('admin.destroy');

        Route::get('/articles/{article}/edit',[ArticleController::class,'edit'])->name('admin.edit');

        Route::put('/articles/{article}/edit',[ArticleController::class, 'update'])->name('admin.update');
*/

        Route::resource('articles',ArticleController::class);
    }
);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
