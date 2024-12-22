@extends('layouts.frontend')
@section('content')

<div class="container-xxl py-6" style="margin-top: 40px;">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-5">
            <!-- Thông Tin Đơn Hàng -->
            <div class="col-lg-7">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="mb-0">Chi Tiết Đơn Hàng #{{ $order->order_id }}</h2>
                        <a href="{{ route('order.history') }}" class="btn btn-primary rounded-pill py-2 px-4">
                            <i class="fas fa-history me-2"></i>Lịch Sử Đơn Hàng
                        </a>
                    </div>
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Thông Tin Người Nhận</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-1"><strong>Họ và Tên:</strong> {{ $order->customer_name }}</p>
                            <p class="mb-1"><strong>Số Điện Thoại:</strong> {{ $order->phone }}</p>
                            <p class="mb-1"><strong>Địa Chỉ Giao Hàng:</strong> {{ $order->address }}</p>
                            <p class="mb-0"><strong>Email:</strong> {{ $order->email }}</p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Trạng Thái Đơn Hàng</h5>
                        </div>
                        <div class="card-body">
                            @if($order->status === 'cancelled')
                                <div class="cancelled-order text-center">
                                    <span class="icon"><i class="fas fa-times-circle"></i></span>
                                    <h5 class="text-danger mt-2">Đã hủy đơn hàng</h5>
                                    <p class="text-muted small">Đơn hàng đã bị hủy và không thể tiếp tục xử lý</p>
                                </div>
                            @else
                                <div class="order-progress">
                                    <div class="progress-track">
                                        <ul class="progressbar">
                                            <li class="{{ in_array($order->status, ['pending', 'processing', 'shipping', 'completed']) ? 'active' : '' }}">
                                                <span class="icon"><i class="fas fa-clock"></i></span>
                                                <span class="text">Chờ xác nhận</span>
                                            </li>
                                            <li class="{{ in_array($order->status, ['processing', 'shipping', 'completed']) ? 'active' : '' }}">
                                                <span class="icon"><i class="fas fa-check"></i></span>
                                                <span class="text">Đã xác nhận</span>
                                            </li>
                                            <li class="{{ in_array($order->status, ['shipping', 'completed']) ? 'active' : '' }}">
                                                <span class="icon"><i class="fas fa-truck"></i></span>
                                                <span class="text">Đang giao hàng</span>
                                            </li>
                                            <li class="{{ $order->status === 'completed' ? 'active' : '' }}">
                                                <span class="icon"><i class="fas fa-box"></i></span>
                                                <span class="text">Đã giao hàng</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <span class="badge {{ $order->status_badge }}">
                                            {{ $order->status_text }}
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if($order->order_notes)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Ghi Chú</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $order->order_notes }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Chi Tiết Sản Phẩm -->
            <div class="col-lg-5">
                <div class="bg-light rounded p-5 wow fadeInUp" data-wow-delay="0.5s">
                    <h2 class="mb-4">Sản Phẩm Trong Đơn</h2>
                    @foreach($order->items as $item)
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset($item->book->image_url ?? 'assets/images/placeholder.png') }}" 
                                 alt="{{ $item->book->title }}"
                                 class="me-3" 
                                 style="width: 60px; height: 80px; object-fit: cover;">
                            <div>
                                <h6 class="mb-1">{{ $item->book->title }}</h6>
                                <small class="text-muted d-block">Số lượng: {{ $item->quantity }}</small>
                                <small class="text-muted">Đơn giá: {{ number_format($item->price) }}đ</small>
                            </div>
                        </div>
                        <div class="text-end">
                            <p class="mb-0 fw-bold">{{ number_format($item->subtotal) }}đ</p>
                        </div>
                    </div>
                    @endforeach

                    <div class="border-top pt-3 mt-3">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Phí Vận Chuyển</h6>
                            <p>0đ</p>
                        </div>

                        <div class="d-flex justify-content-between mb-3 pt-2 border-top">
                            <h6 class="fw-bold">Tổng Cộng</h6>
                            <h6 class="fw-bold text-primary">{{ number_format($order->total_amount) }}đ</h6>
                        </div>
                    </div>

                    @if($order->status === 'pending')
                    <div class="text-center mt-4">
                        <form action="{{ route('order.cancel', $order->order_id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger rounded-pill py-2 px-4"
                                    onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này?')">
                                <i class="fas fa-times-circle me-2"></i>Hủy Đơn Hàng
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.order-progress {
    padding: 20px 10px;
}

.progress-track {
    position: relative;
}

.progressbar {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: space-between;
    list-style: none;
    position: relative;
}

.progressbar::after {
    content: "";
    position: absolute;
    top: 25px;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: #ddd;
    z-index: 1;
}

.progressbar li {
    text-align: center;
    position: relative;
    z-index: 2;
    flex: 1;
}

.progressbar li .icon {
    width: 50px;
    height: 50px;
    line-height: 50px;
    border-radius: 50%;
    background-color: #fff;
    border: 2px solid #ddd;
    display: block;
    margin: 0 auto 10px;
    color: #ddd;
}

.progressbar li.active .icon {
    background-color: #28a745;
    border-color: #28a745;
    color: #fff;
}

.progressbar li .text {
    font-size: 14px;
    display: block;
    color: #777;
}

.progressbar li.active .text {
    color: #28a745;
    font-weight: bold;
}

.cancelled-status {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
}

.cancelled-status .icon {
    width: 50px;
    height: 50px;
    line-height: 50px;
    border-radius: 50%;
    background-color: #dc3545;
    border: 2px solid #dc3545;
    display: block;
    margin: 0 auto 10px;
    color: #fff;
}

.cancelled-status .text {
    font-size: 14px;
    display: block;
    color: #dc3545;
    font-weight: bold;
}

.cancelled-order {
    padding: 30px 0;
}

.cancelled-order .icon {
    width: 80px;
    height: 80px;
    line-height: 80px;
    border-radius: 50%;
    background-color: #dc3545;
    border: 2px solid #dc3545;
    display: block;
    margin: 0 auto;
    color: #fff;
    font-size: 24px;
}

.cancelled-order .icon i {
    line-height: 80px;
}

.cancelled-order h5 {
    margin: 15px 0 5px;
}
</style>

@endsection