@extends('layouts.frontend')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">{{ $category->category_name }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">{{ $category->category_name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Product Start -->
    <div class="container-xxl bg-light my-6 py-6 pt-0">
        <div class="container">
            <div class="bg-primary text-light rounded-bottom p-5 my-6 mt-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 text-light mb-0">Khám Phá Kho Sách Đa Dạng</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <div class="d-inline-flex align-items-center text-start">
                            <i class="fa fa-phone-alt fa-4x flex-shrink-0"></i>
                            <div class="ms-4">
                                <p class="fs-5 fw-bold mb-0">Hỗ trợ 24/7</p>
                                <p class="fs-1 fw-bold mb-0">0868713558</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Filter Section -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center wow fadeInUp" data-wow-delay="0.2s">
                        <div>
                            <h5 class="mb-0">Hiển thị {{ $products->count() }} trong tổng số {{ $products->total() }} sách</h5>
                        </div>
                        <div class="d-flex gap-3">
                            <select class="form-select" style="width: 200px;">
                                <option value="">Sắp xếp theo</option>
                                <option value="price_asc">Giá tăng dần</option>
                                <option value="price_desc">Giá giảm dần</option>
                                <option value="name_asc">Tên A-Z</option>
                                <option value="name_desc">Tên Z-A</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row g-4">
                @foreach($products as $book)
                <div class="col-lg-2-4 col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                        <a href="{{ route('products.detail', $book->book_id) }}" class="text-decoration-none product-link">
                            <div class="text-center">
                                <img class="img-fluid" 
                                     src="{{ asset($book->image_url ?? 'assets/default-book.jpg') }}" 
                                     alt="{{ $book->title }}"
                                     style="height: 180px; object-fit: cover;">
                            </div>
                            <div class="p-3 text-center">
                                <h5 class="book-title mb-1">{{ $book->title }}</h5>
                                <small class="text-muted d-block mb-2">
                                    <i class="fas fa-user-edit me-1"></i>{{ $book->author }}
                                </small>
                                <h6 class="text-primary fw-bold">{{ number_format($book->price) }}đ</h6>
                            </div>
                        </a>
                        <div class="px-3 pb-3">
                            <form action="{{ route('cart.add', $book->book_id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-primary btn-sm rounded-pill w-100">
                                    <i class="fas fa-cart-plus me-1"></i>Thêm vào giỏ
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="row mt-5">
                <div class="col-12">
                    <div class="d-flex justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->

    <style>
    .product-item {
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 0 10px rgba(0,0,0,0.08);
        border: none;
        background-color: #fff;
    }

    .product-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        background-color: var(--primary);
    }

    /* Khi hover vào product-item, thay đổi màu chữ */
    .product-item:hover .book-title,
    .product-item:hover .text-muted,
    .product-item:hover .text-primary {
        color: #fff !important;
    }

    /* Style cho nút thêm vào giỏ khi hover vào product-item */
    .product-item:hover .btn-primary {
        background-color: #fff;
        border-color: #fff;
        color: var(--primary);
    }

    /* Thêm hiệu ứng hover cho icon */
    .product-item:hover .btn-primary:hover {
        background-color: rgba(255, 255, 255, 0.9);
    }

    .product-item:hover .btn-primary .fas {
        transform: translateX(3px);
        transition: transform 0.3s ease;
    }

    .book-title {
        font-size: 0.9rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 2.4rem;
        margin-bottom: 0.3rem;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    .form-select {
        border-radius: 30px;
        padding: 0.5rem 1rem;
    }

    .pagination {
        gap: 5px;
    }

    .page-link {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        border: 1px solid var(--primary);
    }

    .page-link:hover,
    .page-item.active .page-link {
        background-color: var(--primary);
        border-color: var(--primary);
        color: #fff;
    }

    /* Giảm kích thước chữ cho tiêu đề sách */
    .product-item h5 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 2.5rem;
    }

    /* Style cho các nút */
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    /* Thêm style mới cho 5 columns */
    .col-lg-2-4 {
        flex: 0 0 auto;
        width: 20%;
    }

    @media (max-width: 991.98px) {
        .col-lg-2-4 {
            width: 33.333333%;
        }
    }

    @media (max-width: 767.98px) {
        .col-lg-2-4 {
            width: 50%;
        }
    }

    /* Style cho product link */
    .product-link {
        color: inherit;
        flex: 1;
    }

    .product-link:hover {
        color: inherit;
    }

    .product-item {
        cursor: pointer;
    }

    /* Style cho nút thêm vào giỏ */
    .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
        color: #fff;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #fff;
        border-color: var(--primary);
        color: var(--primary);
    }

    /* Thêm hiệu ứng hover cho icon */
    .btn-primary:hover .fas {
        transform: translateX(3px);
        transition: transform 0.3s ease;
    }
    </style>

@endsection