<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProfileController as AdminProProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');

Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::get('/blog/{post}', [PostController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::resource('posts', AdminPostController::class)->middleware('role:post.editor,admin');
    Route::resource('categories', AdminCategoryController::class)->middleware('role:post.editor,admin');
    Route::resource('tags', AdminTagController::class)->middleware('role:post.editor,admin');
    Route::resource('events', AdminEventController::class)->middleware('role:event.editor,admin');
    Route::resource('users', AdminUserController::class)->middleware('role:admin');

    Route::get('/profile', [AdminProProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
