<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Post; // Import the Post model at the top of your file

Route::get('/', function () {
    $posts = Post::with('user')->latest()->get();
    return view('welcome',['posts' => $posts]);
});



Route::get('/dashboard', function () {
    $posts = Post::with('user')->latest()->get(); // Retrieve posts with associated users
    return view('dashboard', ['posts' => $posts]); // Pass the $posts variable to the 'dashboard' view
})->middleware(['auth', 'verified'])->name('dashboard');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('posts', PostController::class)
    ->only(['index', 'store', 'show'])
    ->middleware(['auth', 'verified']);



require __DIR__.'/auth.php';
