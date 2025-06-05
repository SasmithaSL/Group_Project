<?php
// app\Http\Controllers\Admin\BorrowRequestController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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

            // Update order status to approved (ready to be issued)
            $order->update([
                'status' => 'approved'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Order accepted successfully!',
            ]);
        } catch (\Exception $e) {
            Log::error('Accept Order Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while accepting the order.'
            ]);
        }
    }

    public function issueOrder(Request $request, $orderId)
    {
        try {
            Log::info('Issue Order Request Started', [
                'order_id' => $orderId,
                'request_data' => $request->all()
            ]);

            $order = Order::findOrFail($orderId);
            
            Log::info('Order Found', [
                'order_id' => $orderId,
                'current_status' => $order->status,
                'order_details' => $order->toArray()
            ]);
            
            if ($order->status !== 'approved') {
                Log::warning('Order Issue Failed - Invalid Status', [
                    'order_id' => $orderId,
                    'current_status' => $order->status,
                    'required_status' => 'approved'
                ]);
                
                return response()->json([
                    'success' => false, 
                    'message' => 'Only approved orders can be issued. Current status: ' . $order->status
                ]);
            }

            // Check if the database schema supports the issued status
            try {
                DB::statement("SELECT 1 FROM orders WHERE status = 'issued' LIMIT 1");
            } catch (\Exception $e) {
                Log::error('Database Schema Issue - issued status not supported', [
                    'error' => $e->getMessage()
                ]);
                
                return response()->json([
                    'success' => false,
                    'message' => 'Database schema error: issued status not supported. Please run the migration.'
                ]);
            }

            // Update order status and set issue/borrow dates
            $issuedAt = Carbon::now();
            $dueAt = $issuedAt->copy()->addDays(14); // 14 days borrowing period

            $updateData = [
                'status' => 'issued',
                'issued_at' => $issuedAt,
                'due_at' => $dueAt,
            ];

            // Keep borrowed_at for backward compatibility if column exists
            if (Schema::hasColumn('orders', 'borrowed_at')) {
                $updateData['borrowed_at'] = $issuedAt;
            }

            Log::info('Attempting to update order', [
                'order_id' => $orderId,
                'update_data' => $updateData
            ]);

            $updated = $order->update($updateData);

            if (!$updated) {
                Log::error('Order update failed', [
                    'order_id' => $orderId
                ]);
                
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update order status.'
                ]);
            }

            Log::info('Order updated successfully', [
                'order_id' => $orderId,
                'new_status' => $order->fresh()->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Books issued successfully!',
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Order not found', [
                'order_id' => $orderId,
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Order not found.'
            ]);
            
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Database Query Error in Issue Order', [
                'order_id' => $orderId,
                'error' => $e->getMessage(),
                'sql' => $e->getSql() ?? 'N/A',
                'bindings' => $e->getBindings() ?? []
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
            
        } catch (\Exception $e) {
            Log::error('Issue Order Error', [
                'order_id' => $orderId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while issuing the books: ' . $e->getMessage()
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
            
            if ($order->status !== 'issued') {
                return response()->json([
                    'success' => false, 
                    'message' => 'Only issued orders can be marked as returned.'
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