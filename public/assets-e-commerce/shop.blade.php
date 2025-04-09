@extends('layouts.app')

@section('title', 'Shop')

@section('content')
<div class="container py-5">
    <h1 class="mb-4"> Our Shop</h1>

    {{-- Filter/Search (optional) --}}
    <form method="GET" action="{{ route('shop.index') }}" class="mb-4">
        <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
    </form>

    {{-- Products Grid --}}
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                        <p class="mt-auto fw-bold">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('shop.show', $product->id) }}" class="btn btn-primary mt-2">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No products found.</p>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $products->withQueryString()->links() }}
    </div>
</div>
@endsection
