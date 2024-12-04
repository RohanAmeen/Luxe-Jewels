<x-web-layout>
    <div class="container my-5">
        <div class="row">
            <!-- Product Images Section -->
            <div class="col-md-6">
                <!-- Main Product Image -->
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="Product Image">
                </div>

                <!-- Additional Product Images (Thumbnails) -->
                <div class="d-flex">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail mr-2" style="width: 80px;" alt="Thumbnail">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail mr-2" style="width: 80px;" alt="Thumbnail">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail mr-2" style="width: 80px;" alt="Thumbnail">
                </div>
                
            </div>

            <!-- Product Information Section -->
            <div class="col-md-6">
                <h1 class="h3">{{ $product->name }}</h1>
                <p class="text-danger h4">${{ number_format($product->price, 2) }}</p>
                <p class="text-muted">
                    {{ $product->description }}
                </p>
                <button class="btn btn-success btn-lg mb-3">Add to Cart</button>
                
                <div class="reviews">
                    <h5>Customer Reviews</h5>
                    <p class="text-warning">
                        <!-- Assuming you have a review system or a rating value -->
                        ★★★★☆ (4.0)
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>















