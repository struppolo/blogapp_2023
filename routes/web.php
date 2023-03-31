<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* le routes all'interno del gruppo protetto dalla middleware auth sono riservate
   e accessibili solo dopo aver effettuato il login */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/edit/{id}',[PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/edit/{id}',[PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/create',[PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{id}', [PostController::class, 'delete'])->name('posts.delete');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
