<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
			<div class="container">
				<a class="navbar-brand" href="index.html">Luxe Jewels</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni" >
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">Home</a>                 </li>

                <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                 </li>
                <li class="nav-item {{ Request::is('services') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('services') }}">Services</a>
                </li>
                <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                     <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                
            </li>
            
        </ul>
        <!-- <nav class="navbar search">
            <div class="container-fluid">
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn " type="submit">Search</button>
                
              </form>
              
            </div>
          </nav> -->
          <nav class="navbar search">
    <div class="container-fluid">
        <form class="d-flex position-relative" role="search" id="search-form">
            <input class="form-control me-2" type="search" id="search-input" placeholder="Search" aria-label="Search" autocomplete="off">
            <button class="btn" type="button" id="search-btn">Search</button>
            <div id="search-results" class="dropdown-menu position-absolute w-100 mt-2" style="display: none;  max-height: 300px;overflow-y: auto;z-index: 1050;">
                <!-- Search results will appear here -->
            </div>
        </form>
    </div>
</nav>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5 ">
            
            @if (Route::has('login'))
            @auth
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
            </li>
            @else
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('login') }}">LogIn</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item ">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endif
            @endauth
            @endif
            

		<li class="nav-item {{ Request::is('cart') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('cart.view') }}"><img src="/build/assets/images/cart.svg"></a></li>
	</ul>
	</div>
	</div>
				
		</nav>
		<!-- End Header/Navigation -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.trim();

        if (query.length > 2) {
            fetch(`{{ route('search') }}?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    let resultsHTML = '';

                    if (data.products.length > 0) {
                        data.products.forEach(product => {
                            resultsHTML += `
                                <a href="/productDetail/${product.id}" class="dropdown-item">
                                    <img src="{{ asset('storage/') }}/${product.image}" style="width: 50px; height: 50px; margin-right: 10px;" alt="${product.name}">
                                    ${product.name} - $${parseFloat(product.price).toFixed(2)}
                                </a>`;
                        });
                    } else {
                        resultsHTML = '<span class="dropdown-item text-muted">No results found</span>';
                    }

                    searchResults.innerHTML = resultsHTML;
                    searchResults.style.display = 'block';
                });
        } else {
            searchResults.style.display = 'none';
        }
    });

    // Hide results when clicking outside the search area
    document.addEventListener('click', function (e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });
});

        </script>