<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Add product to cart.
     */
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();

        $cartItem = CartItem::updateOrCreate(
            [
                'user_id' => $userId,
                'product_id' => $validated['product_id'],
            ],
            [
                'quantity' => \DB::raw("quantity + {$validated['quantity']}"),
            ]
        );

        return response()->json(['success' => true, 'message' => 'Product added to cart successfully!', 'cart_item' => $cartItem]);
    }

    /**
     * View cart items.
     */
    

public function viewCart()
{
    $userId = Auth::id();

    $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();

    // Calculate subtotal
    $subtotal = $cartItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    return view('web.cart', [
        'cartItems' => $cartItems,
        'subtotal' => $subtotal,
        'total' => $subtotal, // Modify if additional fees or taxes are needed
    ]);
}

    /**
     * Remove item from cart.
     */

// Method to remove the cart item
public function remove($id)
{
    $cartItem = CartItem::findOrFail($id);
    $cartItem->delete();

    return response()->json(['success' => true]);
}
public function update(Request $request, $id)
{
    try {
        // Step 1: Find the cart item
        $cartItem = CartItem::find($id);
        
        // Step 2: Check if cart item exists
        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found.',
            ]);
        }

        // Step 3: Validate quantity input
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Step 4: Update the cart item quantity
        $cartItem->quantity = $request->input('quantity');
        
        // Save changes to database
        $cartItem->save();
        
        // Step 5: Calculate the total price
        $totalPrice = $cartItem->product->price * $cartItem->quantity;

        // Step 6: Return success response with updated price
        return response()->json([
            'success' => true,
            'price' => $cartItem->product->price,
            'total' => $totalPrice, // Send updated total price
        ]);
    } catch (\Exception $e) {
        // Log exception
        \Log::error('Error updating cart item: ' . $e->getMessage());
        
        // Return error response
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while updating the cart.',
        ]);
    }
}

    
}
