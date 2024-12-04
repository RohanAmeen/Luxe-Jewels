<x-app-layout>
<div class="container">
    <h1>Product Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>
        <div class="card-body">
            <!-- Product Image -->
            <div class="mb-3">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 300px;">
                @else
                    <span>No Image Available</span>
                @endif
            </div>

            <!-- Product Information -->
            <p><strong>Category:</strong> {{ $product->category ? $product->category->name : 'N/A' }}</p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>
        </div>
    </div>
    <div class="card-footer text-right">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
</div>
</x-app-layout>
