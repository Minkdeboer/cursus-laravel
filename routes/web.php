<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/user/dashboard', function(){
//     // $user = Auth::user();
//     // if(Auth::check()){
//     //     dd($user->email);
//     // }
//     return view('user-dashboard');
// })->name('user.dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::resource('post', PostController::class)->middleware('auth');

// Route::get('/post', function(){
//     return to_route('post.create', ['user' => 'john doe']);
// })->name('post.index');

// Route::get('/post/create', function(){
//     dd(request());
// })->name('post.create');

// Route::get('send-mail', function(){
//     return view ('send-mail');
// });

// Route::post('send-mail', function(Request $request){
// //    Mail::raw($request->message, function($message) use ($request) {
// //         $message->to($request->email)
// //                 ->subject('Laravel Test Email');
// //    });    

// Mail::to($request->email)->queue(new SendMail($request->message));
// dd("Email Sent");
// })->name('send.mail');

// Route::get('components', function(){
//     return view('blade-component');
// });

// Route::get('session', function(Request $request) {
//     $request->session()->put('foo', 'bar');
//     // Session::put('test', 'bar');
//     return view('session');
// });

// Route::get('cache', function(){
//     // Cache::put('post', 'post title one', $seconds = 5);   
//     // $value = Cache::get('post'); 
//     // dd($value);
//     // $users = Cache::rememberForever('users', function () {
//     //     return User::all();
//     // });
//    // $users = Cache::forget('users');

//     // $users = Cache::pull('users');
//     return view('cache', compact('users'));
// });
