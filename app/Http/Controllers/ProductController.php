<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.dashboard', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    public function store(ProductStoreRequest $request): RedirectResponse
    {
        // Create a new product instance
        $product = new Product();

        // Vul velden vanuit request maar nog niet opslaan
        //je kunt een request all doen omdat ik de vulbare velden in het Model heb aangegeven - zie Product model
        $product->fill($request->all());

        // Verwerk hoofdafbeelding
        $images = $request->file('images', []);
        $product->image = !empty($images)
            ? 'uploads/' . $images[0]->store('products', 'public')
            : 'uploads/default.jpg';

        $product->save();


        // Opslaan van kleuren via relatie
        $colors = collect($request->input('colors', []))
            ->map(fn($color) => ['name' => $color])
            ->toArray();

        //Dit kan ook als je het wat lastig lezen vind - doet hetzelfde
//        $colors = [];
//
//        foreach ($request->colors ?? [] as $color) {
//            $colors[] = ['name' => $color];
//        }


        //Zie Product model voor de relatie - zie dat ik het product_id uit de fillebale velden heb gehaald - dat regeld de relatie
        if (!empty($colors)) {
            $product->colors()->createMany($colors);
        }

        // Opslaan van extra afbeeldingen via relatie
        $imagesData = collect($images)
            ->map(fn($image) => ['path' => 'uploads/' . $image->store('products', 'public')])
            ->toArray();

        if (!empty($imagesData)) {
            $product->images()->createMany($imagesData);
        }

        // Redirect of response
        return redirect()->route('product.index')->with('success', 'Product succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //ophalen van de images en colors van een product via de relatie
        dd($product->images, $product->colors);

        // Implement product display logic if needed
    }

    public function edit(Product $product): View
    {
        return view('admin.product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
            $product =  Product::findOrFail($id);

            // Check and upload main product image (first image as default)
            if ($request->hasFile('images')) {
                File::delete(public_path($product->image)); // Delete old image
                $image = $request->file('images')[0]; // Get first image
                $fileName = $image->store('products', 'public');
                $filePath = 'uploads/' . $fileName;
                $product->image = $filePath; // Store path in the product table
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

                foreach ($product->colors as $color) {
                    $color->delete(); // Delete old colors
                }

                foreach ($request->colors as $color) {
                    ProductColor::create([
                        'product_id' => $product->id,
                        'name' => $color
                    ]);
                }
            }

            // Save multiple product images
            if ($request->hasFile('images')) {

                foreach ($product->images as $image) {
                    File::delete(public_path($image->image_path)); // Delete old images

                }
                $product->images()->delete(); // Delete old images

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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $product = Product::findOrFail($id);
       $product->colors()->delete();
       File::delete(public_path($product->image));
       foreach ($product->images as $image) {
           File::delete(public_path($image->image_path));
       }
       $product->delete();

    }
}
