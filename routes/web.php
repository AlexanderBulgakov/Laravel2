<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ProfileController as AdminProProfileController;
use App\Http\Controllers\PostController;
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
//Route::view('/', 'home')->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
//Route::view('/contact', 'contact')->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');
//Route::view('/about', 'about')->name('about');

Route::get('/blog', [PostController::class, 'index'])->name('blog');;
Route::get('/blog/{post}', [PostController::class, 'show'])->name('blog.show');

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('posts', AdminPostController::class);
    
    Route::get('/profile', [AdminProProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
