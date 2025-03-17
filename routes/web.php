<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('customers', CustomerController::class)->names([
    'create' => 'customer.create'
]);