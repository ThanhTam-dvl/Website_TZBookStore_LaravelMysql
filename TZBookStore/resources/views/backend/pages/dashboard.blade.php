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
    padding: 20px;
    margin-left: 0;
    margin-right: 0;
}

/* Card styles */
.card {
    border: none;
    transition: transform 0.2s ease-in-out;
    background-color: #fff;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    margin-bottom: 1rem;
}

.card-body {
    padding: 1rem;
}

/* Stats cards responsiveness */
@media (max-width: 1160px) {
    .col-xl-3 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    
    .card h3 {
        font-size: 1.5rem;
    }
    
    .card h6 {
        font-size: 0.9rem;
    }
    
    .icon-shape {
        width: 40px;
        height: 40px;
    }
    
    .icon-shape i {
        font-size: 1rem;
    }
}

@media (max-width: 768px) {
    .col-xl-3 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    
    .container-fluid {
        padding: 0.5rem;
    }
}

/* Table responsiveness */
@media (max-width: 1160px) {
    .table {
        font-size: 0.9rem;
    }
    
    .table td, .table th {
        padding: 0.5rem;
    }
    
    .badge {
        padding: 0.4em 0.6em;
        font-size: 0.8rem;
    }
    
    .card-header h5 {
        font-size: 1.1rem;
    }
}

/* Handle table overflow on mobile */
@media (max-width: 768px) {
    .table-responsive {
        margin: 0 -1rem;
    }
    
    .table {
        font-size: 0.8rem;
    }
    
    .table td, .table th {
        padding: 0.4rem;
        white-space: nowrap;
    }
    
    /* Optional: Hide less important columns on mobile */
    .table .products-column,
    .table .date-column {
        display: none;
    }
}

/* Custom scrollbar styles */
.table-responsive::-webkit-scrollbar {
    height: 6px;
}

.table-responsive::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #73879C;
    border-radius: 3px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #5A6B7D;
}
</style>
@endpush
@endsection
