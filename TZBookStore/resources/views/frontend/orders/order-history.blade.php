@extends('layouts.frontend')
@section('content')

<style>
    /* Custom CSS for mobile responsive */
@media screen and (max-width: 770px) {
    /* Container padding adjustment */
    .container-xxl {
        padding: 20px 10px;
        margin-top: 20px !important;
    }

    /* Table header hide and adjustment */
    .table thead {
        display: none;
    }

    /* Convert table rows to cards */
    .table tbody tr {
        display: block;
        margin-bottom: 15px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 10px;
    }

    /* Adjust table cells */
    .table tbody td {
        display: block;
        padding: 8px 5px;
        border: none;
        text-align: left;
        position: relative;
    }

    /* Product image and info adjustment */
    .table td .d-flex {
        flex-direction: row;
        align-items: flex-start;
    }

    .table td img {
        width: 50px !important;
        height: 50px !important;
    }

    /* Add labels for each data point */
    .table td:nth-child(2):before {
        content: "Mã đơn hàng: ";
        font-weight: bold;
    }

    .table td:nth-child(3):before {
        content: "Ngày đặt: ";
        font-weight: bold;
    }

    .table td:nth-child(4):before {
        content: "Tổng tiền: ";
        font-weight: bold;
    }

    .table td:nth-child(5):before {
        content: "Trạng thái: ";
        font-weight: bold;
    }

    /* Button adjustment */
    .table td:last-child {
        text-align: right;
        padding-top: 15px;
        border-top: 1px solid #dee2e6;
        margin-top: 5px;
    }

    .btn-sm {
        padding: 8px 15px;
        width: 100%;
    }

    /* Adjust pagination */
    .pagination {
        justify-content: center;
        flex-wrap: wrap;
        gap: 5px;
    }

    .page-link {
        padding: 8px 12px;
    }

    /* Alert messages */
    .alert {
        margin: 10px 5px;
        padding: 10px;
    }

    /* Empty state */
    .text-center.py-5 {
        padding: 20px !important;
    }
}
</style>

<div class="container-xxl py-6" style="margin-top: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4 mt-5 text-center">Lịch Sử Đơn Hàng</h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($orders->isEmpty())
                    <div class="text-center py-5">
                        <p>Bạn chưa có đơn hàng nào.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Mua Sắm Ngay</a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Ngày Đặt</th>
                                    <th>Tổng Tiền</th>
                                    <th>Trạng Thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @php
                                                $firstItem = $order->items->first();
                                            @endphp
                                            <img src="{{ asset($firstItem->book->image_url ?? 'assets/images/placeholder.png') }}"
                                                 alt="{{ $firstItem->book->title ?? '' }}"
                                                 class="img-thumbnail me-3"
                                                 style="width: 60px; height: 60px; object-fit: cover;">
                                            <div>
                                                <span class="d-block">{{ $firstItem->book->title ?? 'Không có tên sản phẩm' }}</span>
                                                @if($order->items->count() > 1)
                                                    <small class="text-muted">
                                                        +{{ $order->items->count() - 1 }} sản phẩm khác
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>#{{ $order->order_id }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($order->created_at)) }}</td>
                                    <td>{{ number_format($order->total_amount) }}đ</td>
                                    <td>
                                        <span class="badge {{ $order->status_badge }}">
                                            {{ $order->status_text }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('order.detail', $order->order_id) }}" 
                                           class="btn btn-primary btn-sm">
                                            Chi Tiết
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $orders->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection