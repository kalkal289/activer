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

// Route::get('/', [PostController::class,'index'])->name('index');

Route::controller(PostController::class)->middleware('auth')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/{post}', 'show')->name('show');
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
});

Route::controller(MainController::class)->middleware('auth')->group(function() {
    Route::post('/mains', 'store')->name('storeMain');
    Route::get('/mains/create', 'create')->name('createMain');
    Route::get('/mains/{main}', 'show')->name('showMain');
    Route::put('/mains/{main}', 'update')->name('updateMain');
    Route::get('/mains/{main}/edit', 'edit')->name('editMain');
    Route::delete('/mains/{main}', 'delete')->name('deleteMain');
});

Route::controller(StoreController::class)->middleware('auth')->group(function() {
    Route::post('/stores', 'store')->name('storeStore');
    Route::get('/stores/create', 'create')->name('createStore');
    Route::get('/stores/{store}', 'show')->name('showStore');
    Route::put('/stores/{store}', 'update')->name('updateStore');
    Route::get('/stores/{store}/edit', 'edit')->name('editStore');
    Route::delete('/stores/{store}', 'delete')->name('deleteStore');
});

Route::controller(LikeController::class)->middleware('auth')->group(function() {
    Route::get('/like/{post_id}', 'like')->name('like');
    Route::get('/unlike/{post_id}', 'unlike')->name('unlike');
});

Route::controller(FollowController::class)->middleware('auth')->group(function() {
    Route::get('/follow/{user_id}', 'follow')->name('follow');
    Route::get('/unfollow/{user_id}', 'unfollow')->name('unfollow');
});

require __DIR__.'/auth.php';
