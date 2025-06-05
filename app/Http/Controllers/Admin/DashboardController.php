<?php
// app\Http\Controllers\Admin\DashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get dashboard statistics based on your updated status system
        $stats = [
            'pending_borrow_requests' => Order::where('status', 'pending')->count(),
            'pending_returns' => Order::where('status', 'issued')->count(),
            'approved_books' => Order::where('status', 'approved')->count(),
            'active_users' => User::where('role', 'user')->count()
        ];

        // Get overdue books (issued more than 14 days ago and not returned)
        $overdueBooks = Order::with(['user'])
            ->where('status', 'issued')
            ->where('due_at', '<', Carbon::now())
            ->orderBy('due_at', 'asc')
            ->get();

        // Attach book details to each overdue order
        foreach ($overdueBooks as $order) {
            $order->books = Book::whereIn('id', $order->book_ids)->get();
            $order->days_overdue = Carbon::parse($order->due_at)->diffInDays(Carbon::now());
        }

        // Recent borrow requests (last 10)
        $recentRequests = Order::with(['user'])
            ->whereIn('status', ['pending', 'approved', 'issued'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Attach book details to recent requests
        foreach ($recentRequests as $order) {
            $order->books = Book::whereIn('id', $order->book_ids)->get();
        }

        // Monthly statistics for chart
        $monthlyStats = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthlyStats[] = [
                'month' => $date->format('M Y'),
                'requests' => Order::whereMonth('created_at', $date->month)
                    ->whereYear('created_at', $date->year)
                    ->count(),
                'issued' => Order::where('status', 'issued')
                    ->whereMonth('created_at', $date->month)
                    ->whereYear('created_at', $date->year)
                    ->count(),
                'returned' => Order::where('status', 'returned')
                    ->whereMonth('returned_at', $date->month)
                    ->whereYear('returned_at', $date->year)
                    ->count()
            ];
        }

        // Additional detailed statistics
        $detailedStats = [
            'total_books' => Book::count(),
            'returned_books' => Order::where('status', 'returned')->count(),
            'rejected_requests' => Order::where('status', 'rejected')->count(),
            'cancelled_requests' => Order::where('status', 'cancelled')->count(),
            'today_requests' => Order::whereDate('created_at', Carbon::today())->count(),
            'this_month_requests' => Order::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count(),
            'overdue_count' => $overdueBooks->count(),
        ];

        return view('admin.index', compact('stats', 'detailedStats', 'overdueBooks', 'recentRequests', 'monthlyStats'));
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
                'message' => 'Book marked as returned successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while marking the book as returned.'
            ]);
        }
    }
}