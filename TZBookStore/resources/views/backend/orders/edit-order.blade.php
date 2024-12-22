@extends('layouts.backend')

@section('content')
<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="tm-block-title" style="color: #fff; font-weight: bold;">
                        <i class="fas fa-edit me-2"></i>
                        Chi Tiết Đơn Hàng #{{ $order->order_id }}
                    </h2>
                    <a href="{{ route('admin.orders.index') }}" 
                       class="btn" 
                       style="background-color: #00ccff; color: #fff;">
                        <i class="fas fa-arrow-left me-1"></i>
                        Quay Lại
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Order Form -->
                <form action="{{ route('admin.orders.update', $order->order_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Customer Info Section -->
                    <div class="tm-bg-primary-dark tm-block tm-block-h-auto mt-4">
                        <h4 class="tm-block-title" style="color: #9be64d;">
                            <i class="fas fa-user me-2"></i>
                            Thông Tin Khách Hàng
                        </h4>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label style="color: #9be64d;">Tên Khách Hàng</label>
                                    <input type="text" 
                                           class="form-control" 
                                           name="customer_name" 
                                           value="{{ $order->customer_name }}" 
                                           required>
                                </div>
                                <div class="form-group mb-3">
                                    <label style="color: #9be64d;">Email</label>
                                    <input type="email" 
                                           class="form-control" 
                                           name="email" 
                                           value="{{ $order->email }}" 
                                           required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label style="color: #9be64d;">Số Điện Thoại</label>
                                    <input type="text" 
                                           class="form-control" 
                                           name="phone" 
                                           value="{{ $order->phone }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label style="color: #9be64d;">Địa Chỉ</label>
                                    <textarea class="form-control" 
                                              name="address" 
                                              rows="2">{{ $order->address }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Details Section -->
                    <div class="tm-bg-primary-dark tm-block tm-block-h-auto mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="tm-block-title" style="color: #9be64d;">
                                <i class="fas fa-shopping-cart me-2"></i>
                                Chi Tiết Đơn Hàng
                            </h4>
                            <div class="d-flex align-items-center">
                                <span style="color: #fff;" class="me-2">Trạng Thái:</span>
                                <select class="form-control" name="status" style="width: auto;">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                        Chờ Xác Nhận
                                    </option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                        Đang Xử Lý
                                    </option>
                                    <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>
                                        Đang Giao Hàng
                                    </option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                        Hoàn Thành
                                    </option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                        Đã Hủy
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive mt-3">
                            <table class="table table-hover tm-table-small tm-product-table text-white">
                                <thead>
                                    <tr style="background-color: #435c70;">
                                        <th style="color: #fff;">Sản Phẩm</th>
                                        <th style="color: #fff;" class="text-center">Số Lượng</th>
                                        <th style="color: #fff;" class="text-end">Đơn Giá</th>
                                        <th style="color: #fff;" class="text-end">Thành Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td style="color: #fff;">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $item->book->image_url ?? asset('frontend/img/product-default.jpg') }}" 
                                                     alt="Product" 
                                                     class="me-2"
                                                     style="width: 40px; height: 60px; object-fit: cover;">
                                                <span>{{ $item->book->title }}</span>
                                            </div>
                                        </td>
                                        <td style="color: #fff;" class="text-center">{{ $item->quantity }}</td>
                                        <td style="color: #fff;" class="text-end">{{ number_format($item->price) }}đ</td>
                                        <td style="color: #00ccff;" class="text-end">{{ number_format($item->quantity * $item->price) }}đ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end" style="color: #fff;">Tổng Tiền:</td>
                                        <td class="text-end" style="color: #00ccff; font-weight: bold;">
                                            {{ number_format($order->total_amount) }}đ
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="text-end mt-4">
                        <a href="{{ route('admin.orders.index') }}" 
                           class="btn me-2" 
                           style="background-color: #435c70; color: #fff;">
                            <i class="fas fa-times me-1"></i>
                            Hủy
                        </a>
                        <button type="submit" 
                                class="btn" 
                                style="background-color: #00ccff; color: #fff;">
                            <i class="fas fa-save me-1"></i>
                            Lưu Thay Đổi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.form-control {
    background-color: #54657d;
    color: #fff;
    border: 1px solid #00ccff;
    padding: 8px 12px;
    line-height: 1.5;
    height: auto;
}

.form-control:focus {
    background-color: #54657d;
    color: #fff;
    border-color: #00ccff;
    box-shadow: 0 0 0 0.2rem rgba(0, 204, 255, 0.25);
}

select.form-control {
    padding-right: 30px;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23ffffff' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 12px;
}

select.form-control option {
    background-color: #435c70;
    color: #fff;
    padding: 8px 12px;
}

.dropdown-menu {
    padding: 0;
    margin: 0;
    border: 1px solid #00ccff;
    background-color: #435c70;
}

.dropdown-item {
    padding: 8px 12px;
    color: #fff;
    line-height: 1.5;
}

.table td {
    vertical-align: middle;
    padding: 12px 8px;
}

@-moz-document url-prefix() {
    select.form-control {
        padding-right: 30px;
        background-position: right 10px center;
    }
}

select::-ms-expand {
    display: none;
}
</style>
@endpush
@endsection