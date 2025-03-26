<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Implement product listing if needed
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        // Create a new product instance
        $product = new Product();

        // Check and upload main product image (first image as default)
        if ($request->hasFile('images')) {
            $image = $request->file('images')[0]; // Get first image
            $fileName = $image->store('products', 'public');
            $filePath = 'uploads/' . $fileName;
            $product->image = $filePath; // Store path in the product table
        } else {
            $product->image = 'uploads/default.jpg'; // Set default image if none uploaded
        }

        // Assign other product attributes
        $product->name = $request->name;
        $product->price = $request->price;
        $product->short_description = $request->short_description;
        $product->qty = $request->qty;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->save(); // Save the product

        // Save associated colors if provided
        if ($request->has('colors') && !empty($request->colors)) {
            foreach ($request->colors as $color) {
                ProductColor::create([
                    'product_id' => $product->id,
                    'name' => $color
                ]);
            }
        }

        // Save multiple product images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = $image->store('products', 'public');
                $filePath = 'uploads/' . $fileName;
                
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $filePath // Ensure correct column name
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implement product display logic if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Implement product edit logic if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implement product update logic if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implement product delete logic if needed
    }
}
