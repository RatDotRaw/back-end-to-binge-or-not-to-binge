<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// register routes
Route::get('register', function () {
    return view('users.register');
})->name('users.register');
Route::post('register', [\App\Http\Controllers\AuthController::class, 'store'])->name('users.register.store');

// user routes
Route::get('login', function () {
    return view('users.login');
})->name('users.login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('users.login.store');
Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('users.logout');
Route::get('profile/{id}', [\App\Http\Controllers\UserController::class, 'profile'])->name('users.profile');
Route::post('profile/edit', [\App\Http\Controllers\UserController::class, 'editProfile'])->name('user.update');

Route::get('home', [\App\Http\Controllers\HomepageController::class, 'index'])->name('home');
Route::get('video/{id}', [\App\Http\Controllers\VideoController::class, 'show'])->name('video.show');
Route::post('video/like', [\App\Http\Controllers\VideoController::class, 'likeAction'])->name('video.likeAction');

Route::get('history', [\App\Http\Controllers\UserController::class, 'history'])->name('users.history');
