@extends('layouts.frontend')
@section('content')

<div class="container-xxl py-6" style="margin-top: 40px;">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-light rounded p-4 p-sm-5">
                <i class="fas fa-check-circle text-primary mb-4" style="font-size: 4rem;"></i>
                <h2 class="mb-4">Đặt Hàng Thành Công!</h2>
                <p class="mb-4">Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ xử lý đơn hàng của bạn trong thời gian sớm nhất.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('order.history') }}" class="btn btn-primary rounded-pill py-3 px-5">
                        <i class="fas fa-history me-2"></i>Xem Đơn Hàng
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-pill py-3 px-5">
                        <i class="fas fa-home me-2"></i>Về Trang Chủ
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 