@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container py-5">
    <div class="row">
        {{-- Product Image --}}
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded shadow-sm">
        </div>

        {{-- Product Details --}}
        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->name }}</h1>
            <h4 class="text-success mb-3">${{ number_format($product->price, 2) }}</h4>
            <p class="mb-4">{{ $product->description }}</p>

            {{-- Optional: Stock or Category --}}
            {{-- <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p> --}}
            {{-- <p><strong>In Stock:</strong> {{ $product->stock }}</p> --}}

            {{-- Add to Cart Button --}}
            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                </div>
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-cart-plus me-2"></i> Add to Cart
                </button>
            </form>

            <div class="mt-4">
                <a href="{{ route('shop.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-2"></i> Continue Shopping
                </a>
                <a href="{{ route('cart.index') }}" class="btn btn-success">
                    <i class="bi bi-cart me-2"></i> View Cart
                </a>
            </div>
        </div>
    </div>

    {{-- Optional: Related Products --}}
    {{-- <div class="mt-5">
        <h3>Related Products</h3>
        @include('partials.related-products', ['products' => $relatedProducts])
    </div> --}}
</div>
@endsection
