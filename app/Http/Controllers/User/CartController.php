<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use App\Models\Order;      
use App\Models\Cart;       
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CartController extends Controller
{
    public function process(Request $request)
    {
        $selected = $request->input('selected_books');
        if (!$selected || count($selected) === 0) {
            return back()->with('error', 'No books selected.');
        }

        $user = auth()->user();

        $order = Order::create([
            'user_id' => $user->id,
            'order_code' => (string) Str::uuid(),
            'book_ids' => json_encode([]), 
        ]);

        $bookIds = [];

        foreach ($selected as $itemId) {
            $cartItem = Cart::find($itemId);
            if ($cartItem) {
                $bookIds[] = $cartItem->book_id;
                $cartItem->delete(); 
            }
        }

        $order->book_ids = $bookIds;
        $order->save();

        return response()->json([
            'success' => true,
            'order_code' => $order->order_code,
            'book_ids' => $bookIds,
        ]);
    }

    public function remove($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Book removed from cart.');
        }

        return redirect()->back()->with('error', 'Book not found in cart.');
    }

}
