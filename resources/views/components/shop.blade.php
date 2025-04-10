<div class="shop">
    <h1 class="shop-title">Welcome to the Shop</h1>
    <div class="products grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="product border rounded-lg shadow-md p-4">
                <h2 class="product-name text-xl font-semibold mb-2">{{ $product->name }}</h2>
                <p class="product-description text-gray-600 mb-4">{{ $product->description }}</p>
                <p class="product-price text-lg font-bold mb-4">Price: ${{ $product->price }}</p>
                <button class="add-to-cart-btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Add to Cart
                </button>
            </div>
        @endforeach
    </div>
</div>