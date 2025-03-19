<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Models\Address;
use App\Models\Country;
use App\Models\Post;
use App\Models\State;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('customers/trash', [CustomerController::class, 'trashIndex'])->name('customer.trash');
Route::get('customers/restore/{customer}', [CustomerController::class, 'restore'])->name('customers.restore');
Route::delete('customers/trash/{customer}', [CustomerController::class, 'forceDestroy'])->name('customers.force.destroy');

Route::resource('customers', CustomerController::class)->names([
    'create' => 'customer.create'
]);

Route::get('/users', function() {
       $users = User::all();
       $address = Address::all();
       return view ('test', compact('users'));
});

Route::get('/posts', function(){
    
    // Tag::insert([
    //     [
            
    //         'name' => 'Laravel'
    //     ],
    //     [
           
    //         'name' => 'Javascript'
    //     ],
    //     [
            
    //         'name' => 'PHP'
    //     ]
    // ]);
    $post = Post::first();
    // $tag = Tag::first();

    // $post->tags()->synch([2,3]);

   $posts = Post::all();
   return view('post', compact('posts'));

});


Route::get('/join', function(){
    //   $usersWithOrders = DB::table('users')
    //   ->join('orders', 'users.id', '=', 'orders.user_id')
    //   ->select('users.*', 'orders.*')
    //   ->get();

    // $usersWithOrders = DB::table('users')
    // ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
    // ->select('users.name', 'orders.id as order_id') // Assuming 'id' is a column in 'orders' table
    // ->get();

    // $ordersWithUsers = DB::table('orders')
    // ->rightJoin('users', 'users.id', '=', 'orders.user_id')
    // ->select('orders.product_name', 'users.name')
    // ->get();

    // $fullOuterJoin = DB::table('users')
    // ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
    // ->select('users.name', 'orders.product_name')
    // ->unionAll(
    //     DB::table('users')
    //     ->rightJoin('orders', 'users.id', '=', 'orders.user_id')
    //     ->select('users.name', 'orders.product_name')
    // );

    //   dd($fullOuterJoin);
});

Route::get('location', function(){
    // $country = new Country(['name' => 'United States']);
    // $country->save();

    // $state = new State(['name' => 'California']);
    // $country->states()->save($state);

    // $state->cities()->createMany([
    //     ['name' => 'Los Angeles'],
    //     ['name' => 'San Francisco']
    // ]);

    $country = Country::first();


    return view('location', compact('country'));
});

Route::get('image', function() {
      $user = User::find(1);
      $user->image()->create([
        'path' => '/upload/user_one.jpg'
      ]);
});