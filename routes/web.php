<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::group(['middleware' => 'auth'] ,function(){
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::resource('/post', PostController::class)->except(('index'));
    Route::resource('/comments', CommentController::class);
    Route::get('/users/profile', [UserController::class, 'create'])->name('profile');
    Route::resource('/users', UserController::class)->except('create');

});
