<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // ✅ Add this
use App\Models\Order;       // ✅ Add this
use App\Models\Cart;        // ✅ Add this if using Cart model

class CartController extends Controller
{
    public function process(Request $request)
    {
        $selected = $request->input('selected_books');
        if (!$selected || count($selected) === 0) {
            return back()->with('error', 'No books selected.');
        }

        $user = auth()->user();

        // ✅ Create the order with UUID
        $order = Order::create([
            'user_id' => $user->id,
            'order_code' => (string) Str::uuid(),
            'book_ids' => json_encode([]), // Fill later below
        ]);

        $bookIds = [];

        foreach ($selected as $itemId) {
            $cartItem = Cart::find($itemId);
            if ($cartItem) {
                $bookIds[] = $cartItem->book_id;
                $cartItem->delete(); // remove from cart if needed
            }
        }

        // ✅ Save book IDs in JSON field
        $order->book_ids = $bookIds;
        $order->save();

        // ✅ Return order data to front-end (for QR generation)
        return response()->json([
            'success' => true,
            'order_code' => $order->order_code,
            'book_ids' => $bookIds,
        ]);
    }

    public function remove($id)
    {
        // Option 1: If you're using a Cart model and database
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Book removed from cart.');
        }

        return redirect()->back()->with('error', 'Book not found in cart.');
    }
}
