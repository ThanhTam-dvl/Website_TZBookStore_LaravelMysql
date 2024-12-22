@extends('layouts.frontend')
@section('content')

<!-- Cart Section -->
<div class="cart-container" style="margin-top: 95px;">
    <div class="text-center mb-5">
        <p class="text-primary text-uppercase mb-2">Giỏ Hàng</p>
        <h1 class="display-6 mb-4">Sản Phẩm Bạn Đã Chọn</h1>
    </div>

    <form id="cartForm">
        <div class="container">
            @if(empty($cartItems))
            <!-- Empty Cart Placeholder -->
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="fas fa-shopping-cart fa-4x text-muted"></i>
                </div>
                <h3 class="text-muted mb-3">Giỏ hàng của bạn đang trống</h3>
                <p class="text-muted mb-4">Hãy thêm những cuốn sách yêu thích vào giỏ hàng của bạn</p>
                <a href="{{ route('home') }}" class="btn btn-primary rounded-pill px-4 py-2">
                    <i class="fas fa-book me-2"></i>Khám phá sách ngay
                </a>
            </div>
            @else
            <!-- Cart Items -->
            <div class="row">
                <div class="col-lg-8">
                    @foreach($cartItems as $item)
                    <div class="card mb-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <!-- Checkbox -->
                                <div class="col-auto">
                                    <input type="checkbox" 
                                           class="form-check-input item-checkbox" 
                                           data-item-id="{{ $item['cart_item_id'] }}"
                                           data-price="{{ $item['price'] }}"
                                           data-quantity="{{ $item['quantity'] }}"
                                           {{ $item['selected'] ? 'checked' : '' }}>
                                </div>

                                <!-- Book Image -->
                                <div class="col-auto">
                                    <img src="{{ asset($item['image_url'] ?? 'assets/default-book.jpg') }}" 
                                         alt="{{ $item['title'] }}" 
                                         class="img-fluid rounded"
                                         style="width: 100px; height: 140px; object-fit: cover;">
                                </div>

                                <!-- Book Details -->
                                <div class="col">
                                    <h5 class="mb-2">{{ $item['title'] }}</h5>
                                    <p class="text-muted mb-2 small">
                                        <i class="fas fa-user-edit me-2"></i>{{ $item['author'] ?? 'Không có tác giả' }}
                                    </p>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="text-primary fw-bold me-3">{{ number_format($item['price']) }}đ</span>
                                        <div class="quantity-control d-flex align-items-center">
                                            <button type="button" 
                                                    class="btn btn-outline-secondary btn-sm" 
                                                    onclick="updateQuantity('{{ $item['cart_item_id'] }}', {{ $item['quantity'] - 1 }})">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input type="number" 
                                                   class="form-control form-control-sm text-center mx-2" 
                                                   value="{{ $item['quantity'] }}" 
                                                   min="1" 
                                                   style="width: 60px;"
                                                   readonly>
                                            <button type="button" 
                                                    class="btn btn-outline-secondary btn-sm" 
                                                    onclick="updateQuantity('{{ $item['cart_item_id'] }}', {{ $item['quantity'] + 1 }})">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Remove Button -->
                                <div class="col-auto">
                                    <form action="{{ route('cart.remove', $item['cart_item_id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-link text-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Cart Summary -->
                <div class="col-lg-4">
                    <div class="card wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Tổng giỏ hàng</h5>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Tạm tính</span>
                                <span id="totalPrice">{{ number_format($total) }}đ</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Phí vận chuyển</span>
                                <span>0đ</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <strong>Tổng cộng</strong>
                                <strong class="text-primary" id="finalPrice">{{ number_format($total) }}đ</strong>
                            </div>
                            <button type="button" 
                                    onclick="proceedToCheckout()"
                                    class="btn btn-primary w-100 rounded-pill py-3"
                                    id="checkoutButton"
                                    {{ $total > 0 ? '' : 'disabled' }}>
                                <i class="fas fa-shopping-cart me-2"></i>Tiến hành thanh toán
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </form>
</div>

<style>
.quantity-control .form-control:focus {
    box-shadow: none;
    border-color: #ced4da;
}

.card {
    border: none;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

.form-check-input:checked {
    background-color: var(--primary);
    border-color: var(--primary);
}
</style>

@endsection

@push('scripts')
<script>
function updateQuantity(itemId, newQuantity) {
    if (newQuantity < 1) return;
    
    $.ajax({
        url: `/cart/update/${itemId}`,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            quantity: newQuantity
        },
        success: function(response) {
            if(response.success) {
                location.reload();
            }
        }
    });
}

// Xử lý sự kiện khi checkbox thay đổi
$(document).ready(function() {
    $('.item-checkbox').change(function() {
        const itemId = $(this).data('item-id');
        const isChecked = $(this).prop('checked');

        $.ajax({
            url: `/cart/update-selected/${itemId}`,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                selected: isChecked
            },
            success: function(response) {
                if(response.success) {
                    $('#totalPrice').text(response.total_formatted);
                    
                    // Enable/disable checkout button based on total
                    if(response.total > 0) {
                        $('#checkoutButton').prop('disabled', false);
                    } else {
                        $('#checkoutButton').prop('disabled', true);
                    }
                }
            }
        });
    });
});

function proceedToCheckout() {
    @auth
        window.location.href = "{{ route('order.checkout') }}";
    @else
        // Lưu URL hiện tại vào session để sau khi đăng nhập quay lại
        window.location.href = "{{ route('login') }}";
    @endauth
}
</script>
@endpush