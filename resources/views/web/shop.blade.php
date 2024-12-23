<x-web-layout title="Shop - Luxe Jewels">

    <!-- Start Hero Section -->
    <div class="hero text-center d-flex justify-content-center align-items-center py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="display-4 text-white mt-4">SHOP</h1>
                    <h2 class="text-white mt-4">Elevate Your Everyday</h2>
                    <p class="mb-4 mt-4 lead">Discover exquisite jewelry pieces that redefine elegance. From timeless classics to contemporary designs, our collection is crafted with precision and passion. Indulge in the luxury of Luxe Jewels.</p>
                    <p><a href="{{ route('shop') }}" class="mybtn btn-lg me-4">Shop Now</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
			@foreach($products as $product)
                	<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="{{ route('productDetail', $product) }}">
                        <img src="{{ asset(path: 'storage/' . $product->image) }}" class="img-fluid product-thumbnail" alt="{{ $product->name }}">
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <strong class="product-price">${{ number_format($product->price, 2) }}</strong>

                        <span class="icon-cross">
                            <img src="/build/assets/images/cross.svg" class="img-fluid" alt="Remove">
                        </span>
                    </a>
                	</div>
            	@endforeach 
            </div>
        </div>
    </div>

</x-web-layout>


