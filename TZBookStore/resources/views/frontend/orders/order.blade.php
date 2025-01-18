@extends('layouts.frontend')
@section('content')

<!-- Payment Start -->
<div class="container-xxl py-6" style="margin-top: 40px;">
    <div class="container">
        <div class="row g-5">
            <!-- Thông Tin Thanh Toán -->
            <div class="col-lg-7">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <h2 class="mb-4">Thông Tin Thanh Toán</h2>
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form id="payment-form" action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('fullName') is-invalid @enderror" 
                                           id="fullName" name="fullName" value="{{ old('fullName') }}" required>
                                    <label for="fullName">Họ và Tên *</label>
                                    @error('fullName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    <label for="email">Email *</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone') }}" required>
                                    <label for="phone">Số Điện Thoại *</label>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select @error('paymentMethod') is-invalid @enderror" 
                                            id="paymentMethod" name="paymentMethod" required>
                                        <option value="">Chọn Phương Thức Thanh Toán</option>
                                        <option value="1">Thanh Toán Khi Nhận Hàng</option>
                                        <option value="2">Chuyển Khoản Ngân Hàng</option>
                                        <option value="3">Thẻ Tín Dụng</option>
                                    </select>
                                    <label for="paymentMethod">Phương Thức Thanh Toán *</label>
                                    @error('paymentMethod')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" 
                                           id="address" name="address" value="{{ old('address') }}" required>
                                    <label for="address">Địa Chỉ Giao Hàng *</label>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="notes" name="notes" 
                                              style="height: 100px">{{ old('notes') }}</textarea>
                                    <label for="notes">Ghi Chú Đơn Hàng (Không Bắt Buộc)</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Thông Tin Đơn Hàng -->
            <div class="col-lg-5">
                <div class="bg-light rounded p-5 wow fadeInUp" data-wow-delay="0.5s">
                    <h2 class="mb-4">Thông Tin Đơn Hàng</h2>
                    @foreach($orderItems as $item)
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset($item['book']->image_url ?? 'assets/default-book.jpg') }}" 
                                 alt="{{ $item['book']->title }}" 
                                 class="me-3" 
                                 style="width: 50px; height: 50px; object-fit: cover;">
                            <div>
                                <h6 class="mb-0">{{ $item['book']->title }}</h6>
                                <small>Số lượng: {{ $item['quantity'] }}</small>
                            </div>
                        </div>
                        <p class="mb-0">{{ number_format($item['subtotal']) }}đ</p>
                    </div>
                    @endforeach

                    <div class="d-flex justify-content-between mb-3">
                        <h6>Phí Vận Chuyển</h6>
                        <p>0đ</p>
                    </div>

                    <div class="d-flex justify-content-between mb-3 pt-3 border-top">
                        <h6 class="fw-bold">Tổng Cộng</h6>
                        <h6 class="fw-bold text-primary">{{ number_format($totalAmount) }}đ</h6>
                    </div>

                    <!-- Nút xác nhận đặt hàng -->
                    <button type="submit" form="payment-form" class="btn btn-primary rounded-pill py-3 px-5 w-100 mt-4">
                        Xác Nhận Đặt Hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Payment End -->

@endsection
