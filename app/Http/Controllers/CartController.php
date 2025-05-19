<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;



class CartController extends Controller
{
    public function addToCart($bookId)
{
    $user = Auth::user();

    // Prevent adding duplicate book to cart
    $exists = Cart::where('user_id', $user->id)
                  ->where('book_id', $bookId)
                  ->where('status', 'in_cart')
                  ->exists();

    if (!$exists) {
        Cart::create([
            'user_id' => $user->id,
            'book_id' => $bookId,
            'status' => 'in_cart',
        ]);
    }

    return redirect()->back()->with('success', 'Book added to cart!');
}
public function viewCart()
{
    $cartItems = Cart::with('book')
        ->where('user_id', Auth::id())
        ->where('status', 'in_cart')
        ->get();

    return view('user.cart', compact('cartItems'));
}

}
