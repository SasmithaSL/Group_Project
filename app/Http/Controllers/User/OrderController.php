<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;      

class OrderController extends Controller
{
   
public function viewOrders()
{
    $userId = auth()->id();

    $orders = Order::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

    foreach ($orders as $order) {
        $order->books = \App\Models\Book::whereIn('id', $order->book_ids)->get();
    }

    return view('user.orders', compact('orders'));
}

public function downloadQr($orderId)
{
    $order = Order::findOrFail($orderId);

    $qrData = json_encode([
        'order_code' => $order->order_code,
        'book_ids' => $order->book_ids,
    ]);

    $qrImage = QrCode::format('png')
        ->size(300)
        ->generate($qrData);

    return response($qrImage)
        ->header('Content-Type', 'image/png')
        ->header('Content-Disposition', 'attachment; filename="order-qr.png"');
}

public function cancel(Order $order)
{
    if ($order->status !== 'pending') {
        return response()->json(['success' => false, 'message' => 'Only pending orders can be cancelled.']);
    }

    $order->update(['status' => 'cancelled']);
    return response()->json(['success' => true]);
}
}
