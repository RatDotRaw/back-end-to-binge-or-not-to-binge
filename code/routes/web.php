<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomepageController::class, 'index'])->name('home');

// register routes
Route::get('register', function () { return view('users.register'); })->name('users.register');
Route::post('register', [\App\Http\Controllers\AuthController::class, 'store'])->name('users.register.store');

// user routes
Route::get('login', function () {
    return view('users.login');
})->name('users.login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('users.login.store');
Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('users.logout');
Route::get('profile/{id}', [\App\Http\Controllers\UserController::class, 'profile'])->name('users.profile');
Route::post('profile/edit', [\App\Http\Controllers\UserController::class, 'editProfile'])->name('user.update');

Route::get('video/{id}', [\App\Http\Controllers\VideoController::class, 'show'])->name('video.show');
Route::get('random', [\App\Http\Controllers\VideoController::class, 'randomRedirect'])->name('video.random');
Route::post('video/like', [\App\Http\Controllers\VideoController::class, 'likeAction'])->name('video.likeAction');

Route::get('history', [\App\Http\Controllers\UserController::class, 'history'])->name('users.history');

// notes routes
Route::get('notes', [\App\Http\Controllers\NoteController::class, 'index'])->name('note.index');
Route::post('note/save', [\App\Http\Controllers\NoteController::class, 'save'])->name('note.saveNote');
Route::post('note/delete', [\App\Http\Controllers\NoteController::class, 'delete'])->name('note.deleteNote');
Route::post('note/update', [\App\Http\Controllers\NoteController::class, 'update'])->name('note.updateNote');
