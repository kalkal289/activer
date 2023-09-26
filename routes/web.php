<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MypageController;

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

require __DIR__.'/auth.php';
