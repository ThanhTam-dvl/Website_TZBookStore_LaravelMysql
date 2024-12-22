@extends('layouts.backend')

@section('content')
<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="tm-block-title" style="color: #fff; font-weight: bold;">
                        <i class="fas fa-shopping-cart me-2"></i>
                        Quản Lý Đơn Hàng
                    </h2>
                    <span class="badge" style="background-color: #00ccff; color: #fff;">
                        {{ $orders->count() }} đơn hàng
                    </span>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover tm-table-small tm-product-table text-white">
                        <thead>
                            <tr style="background-color: #435c70;">
                                <th style="color: #fff;">Mã Đơn</th>
                                <th style="color: #fff;">Khách Hàng</th>
                                <th style="color: #fff;">Ngày Đặt</th>
                                <th style="color: #fff;">Tổng Tiền</th>
                                <th style="color: #fff;">Trạng Thái</th>
                                <th style="color: #fff;" class="text-center">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <tr>
                                <td style="color: #00ccff;">#{{ $order->order_id }}</td>
                                <td style="color: #fff;">
                                    <div>{{ $order->customer_name }}</div>
                                    <small style="color: #9be64d;">
                                        <i class="far fa-envelope me-1"></i>{{ $order->email }}
                                    </small>
                                </td>
                                <td style="color: #fff;">
                                    @if($order->created_at)
                                        <div>{{ $order->created_at->format('d/m/Y') }}</div>
                                        <small style="color: #9be64d;">{{ $order->created_at->format('H:i') }}</small>
                                    @else
                                        <span>N/A</span>
                                    @endif
                                </td>
                                <td style="color: #fff;">{{ number_format($order->total_amount) }}đ</td>
                                <td>
                                    <span class="badge {{ $order->status_badge }}" style="background-color: #00ccff;">
                                        {{ $order->status_text }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.orders.edit', $order->order_id) }}" 
                                           class="btn btn-sm" 
                                           style="background-color: #00ccff; color: #fff;">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        @if($order->status !== 'cancelled')
                                            <div class="dropdown">
                                                <button class="btn btn-sm dropdown-toggle" 
                                                        type="button" 
                                                        style="background-color: #00ccff; color: #fff;"
                                                        id="dropdownMenuButton{{ $order->order_id }}"
                                                        data-toggle="dropdown" 
                                                        aria-expanded="false">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" 
                                                     style="background-color: #435c70;"
                                                     aria-labelledby="dropdownMenuButton{{ $order->order_id }}">
                                                    @if($order->status === 'pending')
                                                        <form action="{{ route('admin.orders.update', $order->order_id) }}" 
                                                              method="POST" 
                                                              class="dropdown-item-form">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="processing">
                                                            <button type="submit" class="dropdown-item" style="color: #fff;">
                                                                <i class="fas fa-check-circle me-2"></i>
                                                                Xác Nhận Đơn
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if($order->status === 'processing')
                                                        <form action="{{ route('admin.orders.update', $order->order_id) }}" 
                                                              method="POST"
                                                              class="dropdown-item-form">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="shipping">
                                                            <button type="submit" class="dropdown-item" style="color: #fff;">
                                                                <i class="fas fa-truck me-2"></i>
                                                                Chuyển Sang Vận Chuyển
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if($order->status === 'shipping')
                                                        <form action="{{ route('admin.orders.update', $order->order_id) }}" 
                                                              method="POST"
                                                              class="dropdown-item-form">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="completed">
                                                            <button type="submit" class="dropdown-item" style="color: #fff;">
                                                                <i class="fas fa-flag-checkered me-2"></i>
                                                                Hoàn Thành Đơn
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                        @if($order->status === 'cancel_requested')
                                            <form action="{{ route('admin.orders.handle-cancellation', $order->order_id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                <input type="hidden" name="approved" value="1">
                                                <button type="submit" 
                                                        class="btn btn-sm btn-success" 
                                                        title="Chấp nhận hủy đơn">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.orders.handle-cancellation', $order->order_id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                <input type="hidden" name="approved" value="0">
                                                <button type="submit" 
                                                        class="btn btn-sm btn-danger" 
                                                        title="Từ chối hủy đơn">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center" style="color: #fff;">
                                    <i class="fas fa-inbox fa-2x mb-2"></i>
                                    <p>Chưa có đơn hàng nào</p>
                                </td>
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
.dropdown-menu {
    min-width: 200px;
    border: none;
}

.dropdown-item:hover {
    background-color: #00ccff !important;
}

.dropdown-item-form {
    margin: 0;
    padding: 0;
}

.dropdown-item-form .dropdown-item {
    padding: .5rem 1.5rem;
    cursor: pointer;
}

.gap-2 {
    gap: 0.5rem;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    $('.dropdown-toggle').dropdown();
    
    $('.dropdown-item-form').on('submit', function(e) {
        if (!confirm('Bạn có chắc muốn cập nhật trạng thái đơn hàng này?')) {
            e.preventDefault();
        }
    });
});
</script>
@endpush
@endsection
