<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddToCartController extends Controller
{
    public $cart = [];

    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Haal de bestaande winkelwagen op of maak een lege array als deze nog niet bestaat
        $cart = Session::get('cart', []);

        // Controleer of het product al in de winkelwagen zit
        if (isset($cart[$id])) {
            $cart[$id]['qty'] += 1; // Verhoog de hoeveelheid als het product al bestaat
        } else {
            // Voeg een nieuw product toe aan de winkelwagen
            $this->cart[] = [
                'id' => $product->id,
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'color' => 'red',
                'qty' => 1, // Standaard hoeveelheid
            ];
        }

        // Sla de bijgewerkte winkelwagen op in de sessie
        Session::put('cart', $this->cart);

        return response([
            'status' => 'success',
            'message' => 'Product is toegevoegd aan het winkelwagentje',
            'cart_count' => 0, // Stuur het actuele aantal producten terug
        ]);
    }
}
