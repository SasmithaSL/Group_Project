<?php
// app\Http\Controllers\Admin\DashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Book;
use Carbon\Carbon;

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

        // Additional detailed statistics (without issued_at dependency)
        $detailedStats = [
            'total_books' => Book::count(),
            'returned_books' => Order::where('status', 'returned')->count(),
            'rejected_requests' => Order::where('status', 'rejected')->count(),
            'cancelled_requests' => Order::where('status', 'cancelled')->count(),
            'today_requests' => Order::whereDate('created_at', Carbon::today())->count(),
            'this_month_requests' => Order::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count()
        ];

        return view('admin.index', compact('stats', 'detailedStats'));
    }
}