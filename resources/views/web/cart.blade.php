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
                    <td class="product-price">${{ number_format($item->product->price, 2) }}</td>
                    <td>
                      <input type="number" class="form-control text-center" value="{{ $item->quantity }}" onchange="updateCart({{ $item->id }}, this.value)">
                    </td>
                    <td class="product-total">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                    <td>
                      <button type="button" class="btn btn-black btn-sm" onclick="removeFromCart({{ $item->id }})">X</button>
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
      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
              <button type="button" class="btn btn-black btn-sm btn-block">Update Cart</button>
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="text-black h4" for="coupon">Coupon</label>
              <p>Enter your coupon code if you have one.</p>
            </div>
            <div class="col-md-8 mb-3 mb-md-0">
              <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
            </div>
            <div class="col-md-4">
              <button type="button" class="btn btn-black">Apply Coupon</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5 mt-4">
                  <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                </div>
              </div>
              <div class="row mb-3">
  <div class="col-md-6">
    <span class="text-black">Subtotal</span>
  </div>
  <div class="col-md-6 text-right">
    <strong id="subtotal" class="text-black">${{ number_format($subtotal, 2) }}</strong>
  </div>
</div>
<div class="row mb-5">
  <div class="col-md-6">
    <span class="text-black">Total</span>
  </div>
  <div class="col-md-6 text-right">
    <strong id="total" class="text-black">${{ number_format($total, 2) }}</strong>
  </div>
</div>

              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='#'">Proceed To Checkout</button>
                </div>
              </div>
            </div>
          </div>
        </div>
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
            // Update the total price dynamically for the item
            const row = document.getElementById(`cart-item-${id}`);
            if (row) {
                const price = parseFloat(data.price); // Ensure price is a number
                const itemTotal = price * quantity;
                row.querySelector('.product-total').innerText = `$${itemTotal.toFixed(2)}`;
            }

            // Update the subtotal and total for the cart
            let subtotal = 0;
            document.querySelectorAll('.product-total').forEach((el) => {
                const itemTotal = parseFloat(el.innerText.replace('$', ''));
                if (!isNaN(itemTotal)) {
                    subtotal += itemTotal;
                }
            });

            // Update the subtotal and total fields
            document.getElementById('subtotal').innerText = `$${subtotal.toFixed(2)}`;
            document.getElementById('total').innerText = `$${subtotal.toFixed(2)}`;
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while updating the cart.');
    });
}


    function updateCartTotals() {
      let subtotal = 0;

      document.querySelectorAll('.product-total').forEach(item => {
        subtotal += parseFloat(item.innerText.replace('$', ''));
      });

      document.getElementById('subtotal').innerText = '$' + subtotal.toFixed(2);
      document.getElementById('total').innerText = '$' + subtotal.toFixed(2); // Assuming no additional charges
    }

    function removeFromCart(id) {
      if (!confirm("Are you sure you want to remove this item from the cart?")) return;

      fetch(`/cart/remove/${id}`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          document.getElementById(`cart-item-${id}`).remove();
          updateCartTotals();
          alert('Item removed successfully');
        } else {
          alert(data.message);
        }
      });
    }
  </script>
</x-web-layout>
