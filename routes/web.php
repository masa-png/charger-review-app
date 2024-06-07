<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

require __DIR__ . '/auth.php';

Route::get('/', [TopController::class, 'index'])->name('top');

Route::get('products', [ProductController::class, 'index'])->name('products.index');

Route::get('reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('contact/thanks', [ContactController::class, 'index_thanks'])->name('contact.thanks');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('users/mypage', 'mypage')->name('mypage');
        Route::patch('users/mypage/image', 'update_image')->name('mypage.update_image');
        Route::get('users/mypage/create/review', 'create_review')->name('mypage.create_review');
        Route::get('users/mypage/edit/review', 'edit_review')->name('mypage.edit_review');
        Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
        Route::put('users/mypage', 'update')->name('mypage.update');
        Route::get('users/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
        Route::put('users/mypage/password', 'update_password')->name('mypage.update_password');
        Route::delete('users/mypage/delete', 'destroy')->name('mypage.destroy');
    });

    Route::controller(ReviewController::class)->group(function () {
        Route::post('reviews/store', 'store')->name('reviews.store');
        Route::put('reviews/update/{review}', 'update')->name('reviews.update');
    });

    Route::controller(CommentController::class)->group(function () {
        Route::post('comments/store/{review}', 'store')->name('comments.store');
        Route::post('comments/reply/{review}', 'store_reply')->name('comments.store_reply');
    });
});
