<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\EntranceController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/entrance/{kind}', [entranceController::class,'entrance'])->name('entrance');

Route::get('/', [PostController::class,'index'])->name('index');

Route::controller(PostController::class)->middleware('auth')->group(function() {
    // Route::get('/', 'index')->name('index');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/followeds', 'followeds')->name('followedsPost');
    Route::get('/posts/filter', 'filter')->name('postFilter');
    Route::get('/posts/search', 'search')->name('search');
    Route::get('/posts/{post_id}', 'show')->name('show');
    Route::get('/posts/{post_id}/likes', 'showLikes')->name('showLikes');
    Route::delete('/posts/{post}', 'delete')->name('deletePost');
});

Route::controller(CommentController::class)->middleware('auth')->group(function() {
    Route::post('/comments', 'comment')->name('comment');
    Route::delete('/comments/{comment}', 'delete')->name('deleteComment');
});

Route::controller(MypageController::class)->middleware('auth')->group(function() {
    Route::get('/mypages/{user}', 'mypageMain')->name('mypageMain');
    Route::get('/mypages/posts/{user}', 'mypagePost')->name('mypagePost');
    Route::get('/mypages/big/{user}', 'mypageBigPost')->name('mypageBigPost');
    Route::get('/mypages/store/{user}', 'mypageStore')->name('mypageStore');
    Route::get('/mypages/posts/{user}/filter', 'filterPost')->name('mypageFilterPost');
    Route::get('/mypages/big/{user}/filter', 'filterBigPost')->name('mypageFilterBigPost');
    Route::get('/mypages/likes/{user}', 'likePost')->name('likePost');
    Route::get('/mypages/profile/{user}', 'editProfile')->name('editProfile');
    Route::put('/mypages/profile/{user}', 'updateProfile')->name('updateProfile');
});

Route::controller(MainController::class)->middleware('auth')->group(function() {
    Route::post('/mains', 'store')->name('storeMain');
    Route::get('/mains/create', 'create')->name('createMain');
    Route::get('/mains/filter', 'filter')->name('mainFilter');
    Route::get('/mains/{main}', 'show')->name('showMain');
    Route::put('/mains/{main}', 'update')->name('updateMain');
    Route::get('/mains/{main}/edit', 'edit')->name('editMain');
    Route::delete('/mains/{main}', 'delete')->name('deleteMain');
});

Route::controller(StoreController::class)->middleware('auth')->group(function() {
    Route::post('/stores', 'store')->name('storeStore');
    Route::get('/stores/create', 'create')->name('createStore');
    Route::get('/stores/filter', 'filter')->name('storeFilter');
    Route::get('/stores/{store}', 'show')->name('showStore');
    Route::put('/stores/{store}', 'update')->name('updateStore');
    Route::get('/stores/{store}/edit', 'edit')->name('editStore');
    Route::delete('/stores/{store}', 'delete')->name('deleteStore');
});

Route::controller(LikeController::class)->middleware('auth')->group(function() {
    Route::post('/like', 'like')->name('like');
});

Route::controller(FollowController::class)->middleware('auth')->group(function() {
    Route::get('/follow/{user_id}', 'follow')->name('follow');
    Route::get('/unfollow/{user_id}', 'unfollow')->name('unfollow');
    Route::get('/followeds/{user}', 'followeds')->name('followeds');
    Route::get('/followers/{user}', 'followers')->name('followers');
});

Route::controller(UserController::class)->middleware('auth')->group(function() {
    Route::get('/users/filter', 'filter')->name('userFilter');
});

require __DIR__.'/auth.php';
