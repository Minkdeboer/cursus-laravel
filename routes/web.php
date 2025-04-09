<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/test', function () {
    return view('test');
})->name('test');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [NoteController::class, 'index'])->name('dashboard');

    // Messaging
    Route::get('/fetch-messages', [ChatController::class, 'fetchMessages'])->name('fetch-messages');
    Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send-message');
});

Route::resource('notes', NoteController::class);

Route::get('/shop', function () {
    return view('shop-view');
})->name('shop');

require __DIR__.'/auth.php';
