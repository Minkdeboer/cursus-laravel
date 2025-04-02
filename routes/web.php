<?php

use App\Events\NewMessage;
use App\Facades\Notification;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\ProfileController;
use App\Jobs\SendWelcomeEmail;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KaasController;
use App\Http\Controllers\SampleController;
use App\Services\NotificationService;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('test', SampleController::class);

// Route::get('test', function(){
//     dd(app());
// });

Route::resource('kaas', KaasController::class);

Route::get('get', function(){
    // $notification = app(NotificationService::class);
    // dd($notification->send('Hallo', 'test@gmail.com'));

    $notification =Notification::send('Hallo', 'test@gmail.com');
    dd($notification);
});


Route::get('/product-details/{id}', [ProductPageController::class, 'show'])->name('product-details');

// Route::get('/dashboard', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/send', function(){
    $user = User::find(1);
    dispatch(new SendWelcomeEmail($user));
    dd("Email Sent");
});

Route::get('messages', function(){
    return view('messages');
}); 

Route::get('send-message', function(){
    event(new NewMessage("Hello World"));

    dd('Message sent');
});

Route::resource('postings', PostingController::class);

Route::post('/add-to-cart/{id}', [AddToCartController::class, 'store'])->name('add-to-cart');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::resource('product', ProductController::class);

// //je kunt ook een groep aanmaken voor de routes product - is leesbaarder dan een resource (vind ik)
// Route::prefix('product')->as('product.')->middleware(['auth'])->group(function () {

//     //GET
//     Route::get('/', [ProductController::class, 'index'])->name('index');
//     Route::get('create', [ProductController::class, 'create'])->name('create');
//     Route::get('{product}/edit', [ProductController::class, 'edit'])->name('edit');
//     Route::get('{product}/show', [ProductController::class, 'show'])->name('show');

//     //POST
//     Route::post('store', [ProductController::class, 'store'])->name('store');
//     Route::post('{product}/update', [ProductController::class, 'update'])->name('update');
//     Route::post('{product}/destroy', [ProductController::class, 'destroy'])->name('destroy');

// });

// Route::get('/user/dashboard', function(){
//     // $user = Auth::user();
//     // if(Auth::check()){
//     //     dd($user->email);
//     // }
//     return view('user-dashboard');
// })->name('user.dashboard')->middleware('auth');


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
