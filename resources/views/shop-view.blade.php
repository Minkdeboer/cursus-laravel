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
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-cart-plus me-2"></i> Add to Cart
                </button>
            </form>
        </div>
    </div>

    {{-- Optional: Related Products --}}
    {{-- <div class="mt-5">
        <h3>Related Products</h3>
        @include('partials.related-products', ['products' => $relatedProducts])
    </div> --}}
</div>
@endsection
