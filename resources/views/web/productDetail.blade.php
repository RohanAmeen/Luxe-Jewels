 <x-web-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="Product Image">
                </div>

                <div class="d-flex">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail mr-2" style="width: 80px;" alt="Thumbnail">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail mr-2" style="width: 80px;" alt="Thumbnail">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail mr-2" style="width: 80px;" alt="Thumbnail">
                </div>
                
            </div>

            <div class="col-md-6">
                <h1 class="h3">{{ $product->name }}</h1>
                <p class="text-danger h4">${{ number_format($product->price, 2) }}</p>
                <p class="text-muted">
                    {{ $product->description }}
                </p>
                <!-- <button class="btn btn-success btn-lg mb-3">Add to Cart</button> -->
                <button class="btn btn-success btn-lg mb-3 add-to-cart" data-product-id="{{ $product->id }}">
    Add to Cart
</button>
                
                <div class="reviews">
                    <h5>Customer Reviews</h5>
                    <p class="text-warning">
                        ★★★★☆ (4.0)
                    </p>
                </div>
            </div>
        </div>
    </div>
<script>
    document.querySelector('.add-to-cart').addEventListener('click', function (e) {
    e.preventDefault();
    const productId = this.getAttribute('data-product-id');

    fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({
            product_id: productId,
            quantity: 1, // Default quantity
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert(data.message);
            } else {
                alert('Error adding to cart');
            }
        })
        .catch((error) => console.error('Error:', error));
});

</script>
</x-web-layout>

