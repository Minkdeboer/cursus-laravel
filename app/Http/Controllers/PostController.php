<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PostController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [new Middleware(CheckRoleMiddleware::class)];
    
    }
   
   function index(){
    return view('post.index');
   }

   function handlePost(Request $request) {
        dd($request->all());
   }
}