<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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

    $fullOuterJoin = DB::table('users')
    ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
    ->select('users.name', 'orders.product_name')
    ->unionAll(
        DB::table('users')
        ->rightJoin('orders', 'users.id', '=', 'orders.user_id')
        ->select('users.name', 'orders.product_name')
    );

      dd($fullOuterJoin);
});