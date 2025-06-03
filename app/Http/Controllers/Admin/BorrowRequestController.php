<?php
// app\Http\Controllers\Admin\BorrowRequestController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Book;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BorrowRequestController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        // Attach books data to each order
        foreach ($orders as $order) {
            $order->books = Book::whereIn('id', $order->book_ids)->get();
        }

        return view('admin.borrow-requests', compact('orders'));
    }

    public function acceptOrder(Request $request, $orderId)
    {
        try {
            $order = Order::findOrFail($orderId);
            
            if ($order->status !== 'pending') {
                return response()->json([
                    'success' => false, 
                    'message' => 'Only pending orders can be accepted.'
                ]);
            }

            // Update order status and set borrow dates
            $borrowedAt = Carbon::now();
            $dueAt = $borrowedAt->copy()->addDays(14); // 14 days borrowing period

            $order->update([
                'status' => 'approved',
                'borrowed_at' => $borrowedAt,
                'due_at' => $dueAt,
            ]);

            // Generate QR code
            $qrData = json_encode([
                'order_code' => $order->order_code,
                'book_ids' => $order->book_ids,
                'borrowed_at' => $borrowedAt->toDateString(),
                'due_at' => $dueAt->toDateString(),
            ]);

            $qrImage = QrCode::format('png')
                ->size(300)
                ->generate($qrData);

            $qrBase64 = base64_encode($qrImage);

            return response()->json([
                'success' => true,
                'message' => 'Order accepted successfully!',
                'qr_code' => 'data:image/png;base64,' . $qrBase64
            ]);
        } catch (\Exception $e) {
            Log::error('Accept Order Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while accepting the order.'
            ]);
        }
    }

    public function rejectOrder(Request $request, $orderId)
    {
        try {
            // Log the incoming request for debugging
            Log::info('Reject Order Request', [
                'order_id' => $orderId,
                'request_data' => $request->all(),
                'content_type' => $request->header('Content-Type')
            ]);

            $order = Order::findOrFail($orderId);
            
            if ($order->status !== 'pending') {
                return response()->json([
                    'success' => false, 
                    'message' => 'Only pending orders can be rejected.'
                ]);
            }

            // Get the reason from request - handle both form data and JSON
            $reason = $request->input('reason') ?? $request->json('reason') ?? 'Rejected by admin';
            
            // Ensure reason is not empty
            if (empty(trim($reason))) {
                $reason = 'Rejected by admin';
            }

            $updated = $order->update([
                'status' => 'rejected',
                'notes' => $reason
            ]);

            Log::info('Order Update Result', [
                'order_id' => $orderId,
                'updated' => $updated,
                'new_status' => $order->fresh()->status,
                'notes' => $order->fresh()->notes
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Order rejected successfully!'
            ]);

        } catch (\Exception $e) {
            Log::error('Reject Order Error: ' . $e->getMessage(), [
                'order_id' => $orderId,
                'stack_trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while rejecting the order: ' . $e->getMessage()
            ]);
        }
    }

    public function markAsReturned($orderId)
    {
        try {
            $order = Order::findOrFail($orderId);
            
            if ($order->status !== 'approved') {
                return response()->json([
                    'success' => false, 
                    'message' => 'Only approved orders can be marked as returned.'
                ]);
            }

            $order->update([
                'status' => 'returned',
                'returned_at' => Carbon::now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Order marked as returned successfully!'
            ]);
        } catch (\Exception $e) {
            Log::error('Mark as Returned Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while marking the order as returned.'
            ]);
        }
    }
}