<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'totalOrders' => Order::count(),
            'totalProducts' => Book::count(),
            'totalUsers' => User::count(),
            'totalRevenue' => Order::where('status', 'completed')->sum('total_amount'),
            'recentOrders' => Order::with('items')
                ->latest()
                ->take(5)
                ->get()
                ->map(function($order) {
                    $order->items_count = $order->items->count();
                    $order->status_color = $this->getStatusColor($order->status);
                    $order->status_text = $this->getStatusText($order->status);
                    return $order;
                })
        ];

        return view('backend.pages.dashboard', $data);
    }

    private function getStatusColor($status)
    {
        return [
            'pending' => 'warning',
            'processing' => 'info',
            'shipping' => 'primary',
            'completed' => 'success',
            'cancelled' => 'danger',
        ][$status] ?? 'secondary';
    }

    private function getStatusText($status)
    {
        return [
            'pending' => 'Chờ xác nhận',
            'processing' => 'Đang xử lý',
            'shipping' => 'Đang giao hàng',
            'completed' => 'Hoàn thành',
            'cancelled' => 'Đã hủy',
        ][$status] ?? 'Unknown';
    }
} 