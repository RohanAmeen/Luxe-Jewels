<x-web-layout title="Cart - Luxe Jewels">
  <div class="text-center text-black mt-4">
    <h1>Cart</h1>
  </div>

  <div class="untree_co-section before-footer-section">
    <div class="container">
      <div class="row mb-5">
        <form class="col-md-12" id="cart-form">
          <div class="site-blocks-table">
            <table class="table">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($cartItems as $item)
          <tr id="cart-item-{{ $item->id }}">
            <td class="product-thumbnail">
            <img src="{{ asset('storage/' . $item->product->image) }}" alt="Image" class="img-fluid">
            </td>
            <td class="product-name">
            <h2 class="h5 text-black">{{ $item->product->name }}</h2>
            </td>
            <td>${{ number_format($item->product->price, 2) }}</td>
            <td>
            <input type="number" class="form-control text-center" value="{{ $item->quantity }}"
              onchange="updateCart({{ $item->id }}, this.value)">
            </td>
            <td class="product-total">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
            <td>
            <button class="btn btn-black btn-sm" onclick="removeFromCart({{ $item->id }})">X</button>
            </td>

          </tr>
        @empty
      <tr>
        <td colspan="6" class="text-center">Your cart is empty</td>
      </tr>
    @endforelse

              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function updateCart(id, quantity) {
      fetch(`/cart/update/${id}`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ quantity })
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Update the total price dynamically in the UI
            let price = data.price;
            let total = data.total;

            // Find the corresponding row for the cart item
            let row = document.getElementById('cart-item-' + id);
            if (row) {
              // Update the total price for this row
              row.querySelector('.product-total').innerText = '$' + total.toFixed(2);
            }
          } else {
            alert(data.message);
          }
        });
    }


    // Remove cart item via AJAX
    function removeFromCart(id) {
      if (!confirm("Are you sure you want to remove this item from the cart?")) {
        return;
      }

      fetch(`/cart/remove/${id}`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
        }
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            // Remove the item row from the DOM
            document.getElementById(`cart-item-${id}`).remove();
            alert('Item removed successfully');
          } else {
            alert(data.message);
          }
        })
        .catch((error) => {
          console.error('Error:', error);
          alert('An error occurred while removing the item.');
        });
    }
  </script>
</x-web-layout>