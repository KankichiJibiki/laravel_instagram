<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\LikeController;

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
    Route::patch('/users/{user_id}/activate', [UserController::class, 'activate'])->name('activate');
    Route::get('/post/adminPost', [PostController::class, 'showPostAdmin'])->name('showPostAdmin');
    Route::delete('/post/hideBlock/{post_id}', [PostController::class, 'hideBlock'])->name('hideBlock');
    Route::patch('/post/unhide/{post_id}', [PostController::class, 'unhide'])->name('unhide');

    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::resource('/post', PostController::class)->except('index');
    Route::resource('/comments', CommentController::class);
    Route::get('/users/profile', [UserController::class, 'create'])->name('profile');
    Route::resource('/users', UserController::class)->except('create');
    Route::resource('/follower', FollowerController::class);
    Route::resource('/likes', LikeController::class);
    Route::resource('/categories', CategoryController::class);
    Route::patch('/categories/unhide_category/{category_id}', [CategoryController::class, 'unhide_category'])->name('unhide_category');
});
