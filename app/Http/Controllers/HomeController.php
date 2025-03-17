<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index() {
        
        // DB::table('users')->insert([[
        //     'name' => 'Arctic',
        //     'email' => 'Arctic@gmail.com',
        //     'password' => '12345678'
        // ],[
        //     'name' => 'Johan Doe',
        //     'email' => 'johan@gmail.com',
        //     'password' => '12345678'
        // ]]);

        // $
        
        // DB::table('users')->where('id', 1)->update([
        //     'name' => 'Johan Doeleen'
        // ]);

    //     DB::table('users')->where('id', 4)->delete();

    //     return view('welcome');
    // }

    // $users = DB::table('users')->pluck('name', 'id')->toArray();
    // dd($users);
    // }

    $products = DB::table('products')->get();
    dd($products);
    }

    function about() {
        return view('about');
    }
}
