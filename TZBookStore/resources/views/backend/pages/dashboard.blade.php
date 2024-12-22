@extends('layouts.backend')

@section('content')
<div class="dashboard-container">
    <div class="container-fluid mt-4">
        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Orders</h6>
                                <h3 class="mb-0">{{ $totalOrders ?? 0 }}</h3>
                            </div>
                            <div class="icon-shape bg-primary text-white rounded-circle p-3">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Products</h6>
                                <h3 class="mb-0">{{ $totalProducts ?? 0 }}</h3>
                            </div>
                            <div class="icon-shape bg-success text-white rounded-circle p-3">
                                <i class="fas fa-book"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Users</h6>
                                <h3 class="mb-0">{{ $totalUsers ?? 0 }}</h3>
                            </div>
                            <div class="icon-shape bg-info text-white rounded-circle p-3">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Revenue</h6>
                                <h3 class="mb-0">{{ number_format($totalRevenue ?? 0) }}đ</h3>
                            </div>
                            <div class="icon-shape bg-warning text-white rounded-circle p-3">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Recent Orders</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Products</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentOrders ?? [] as $order)
                            <tr>
                                <td>#{{ $order->order_id }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->items_count }} items</td>
                                <td>{{ number_format($order->total_amount) }}đ</td>
                                <td>
                                    <span class="badge badge-{{ $order->status_color }}">
                                        {{ $order->status_text }}
                                    </span>
                                </td>
                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No orders found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.dashboard-container {
    display: block;
    background-color: #4e657a;
    min-height: calc(100vh - 56px);
    padding: 30px 0;
    margin-left: 140px;
    margin-right: 140px;
}

.card {
    border: none;
    transition: transform 0.2s ease-in-out;
    background-color: #fff;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.card:hover {
    transform: translateY(-3px);
}

.icon-shape {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    width: 50px;
    height: 50px;
}

.table th {
    border-top: none;
    background-color: rgba(255, 255, 255, 0.05);
    color: #73879C;
}

.badge {
    padding: 0.5em 0.75em;
}

.card-header {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    color: #73879C;
    background-color: #f8f9fa;
}

.table-hover tbody tr:hover {
    background-color: rgba(42, 63, 84, 0.05);
}

.table-responsive::-webkit-scrollbar {
    height: 8px;
}

.table-responsive::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #73879C;
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #5A6B7D;
}

.table {
    color: #73879C;
    margin-bottom: 0;
}

.table thead th {
    background-color: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
}

.bg-primary { background-color: #007bff !important; }
.bg-success { background-color: #28a745 !important; }
.bg-info { background-color: #17a2b8 !important; }
.bg-warning { background-color: #ffc107 !important; }
</style>
@endpush
@endsection
