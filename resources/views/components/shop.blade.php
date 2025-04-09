<div class="shop">
    <h1>Welcome to the Shop</h1>
    <div class="products">
        @foreach($products as $product)
            <div class="product">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Price: ${{ $product->price }}</p>
                <button>Add to Cart</button>
            </div>
        @endforeach
    </div>
</div>