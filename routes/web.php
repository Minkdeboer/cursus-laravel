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
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
})->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/shop', function () {
    return view('shop-view');
})->name('shop');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard view
    Route::get('/dashboard', [NoteController::class, 'index'])->name('dashboard');

    // AJAX appearance update route (for JavaScript POST request)
    Route::post('/note/appearance', [NoteController::class, 'changeAppearance'])->name('note.appearance');

    // Full CRUD routes for notes
    Route::resource('notes', NoteController::class);
    Route::get('notes/put-archived/{id}', [NoteController::class, 'putArchived'])->name('notes.put-archived');
    Route::get('notes/archived', [NoteController::class, 'archived'])->name('notes.archived');
    Route::get('notes/trashed', [NoteController::class, 'trash'])->name('notes.trash');

    // Messaging routes
    Route::get('/fetch-messages', [ChatController::class, 'fetchMessages'])->name('fetch-messages');
    Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send-message');
});

require __DIR__.'/auth.php';
