<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // Display the welcome.blade.php view
})->name('home'); // Define the route name as 'home'

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::get('/dashboard', [ChatController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard'); // Define the route for the dashboard

require __DIR__.'/auth.php';

// Ensure the login route is defined and supports GET for displaying the login form
Route::get('/login', function () {
    return view('auth.login'); // Adjust the view path if necessary
})->name('login');

Route::get('/register', function () {
    return view('auth.register'); // Adjust the view path if necessary
})->name('register');
