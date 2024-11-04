<x-web-layout>
    <div class="container my-5">
        <div class="row">
            <!-- Product Image Section -->
            <div class="col-md-6">
                <div class="mb-4">
                    <img src="build\assets\images/pd1.jpg" class="img-fluid rounded" alt="Product Image">
                </div>
                <div class="d-flex">
                    <img src="build/assets/images/pd1.jpg" class="img-thumbnail mr-2" style="width: 80px;" alt="Thumbnail 1">
                    <img src="build\assets\images/pd2.jpg" class="img-thumbnail mr-2" style="width: 80px;" alt="Thumbnail 2">
                    <img src="build\assets\images/pd3.jpg" class="img-thumbnail" style="width: 80px;" alt="Thumbnail 3">
                </div>
            </div>

            <!-- Product Information Section -->
            <div class="col-md-6">
                <h1 class="h3 text-black">Stainless Steel Bracelet</h1>
                <p class="text-black h4"><strike class="text-danger">$99.00</strike> $43.00</p>
                <p class="text-muted">
                This Stainless Steel Branded Cartier Bracelet for Girls brings together elegance and durability in a timeless design. Crafted from premium stainless steel, this bracelet is inspired by Cartier’s iconic style, known for its refined simplicity and luxurious appeal. Designed with a sleek finish and hypoallergenic material, it’s perfect for daily wear and complements any outfit, adding a touch of sophistication.<br>

                <b>Premium Material:</b> Made from high-quality stainless steel for durability and lasting shine.
<br><b>Comfortable Fit:</b> Lightweight and hypoallergenic, designed for all-day wear.
<br><b>Versatile Style:</b> Ideal for both casual and formal occasions.
<br><b>Perfect Gift:</b> A meaningful and stylish choice for birthdays, anniversaries, or any special occasion.
                </p>
                <button class="btn text-white btn-lg mb-3"><a href="{{ route('cart') }}" class="addtocartbtn">Add to Cart</a></button>

                <div class="reviews">
                    <h5>Customer Reviews</h5>
                    <p class="text-warning">★★★★☆ (4.0)</p>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>