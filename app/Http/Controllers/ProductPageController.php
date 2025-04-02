<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    function index(){
        $products = Product::all();
        return view('layouts.pages.home', compact('products'));
    }

    function show($id){
        $product = Product::findOrFail($id);
        return view('layouts.pages.product-details', compact('product'));
    }

    function create(){
        return view('layouts.pages.create-product');
    }

    function store(Request $request){
        $product = Product::create($request->all());
        return redirect()->route('product.show', $product->id);
    }

    function edit($id){
        $product = Product::findOrFail($id);
        return view('layouts.pages.edit-product', compact('product'));
    }

    function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('product.show', $product->id);
    }

    function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
