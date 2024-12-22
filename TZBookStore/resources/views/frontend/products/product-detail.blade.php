@extends('layouts.frontend')
@section('content')

<div class="container-xxl py-6" style="margin-top: 70px;">
    <div class="container">
        <div class="row g-5">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden">
                    <img class="w-100 h-100" src="{{ asset($book->image_url ?? 'frontend/img/product-default.jpg') }}" 
                         alt="{{ $book->title }}" style="object-fit: cover;">
                </div>
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="display-6 mb-4">{{ $book->title }}</h1>
                    
                    <div class="d-flex align-items-center mb-4">
                        <div class="border border-primary rounded-pill px-4 py-2">
                            <span class="text-primary fw-bold fs-4">{{ number_format($book->price) }} VNĐ</span>
                        </div>
                        <div class="ms-4">
                            <small class="text-muted">Tình trạng: 
                                @if($book->stock_quantity > 0)
                                    <span class="text-success">Còn hàng ({{ $book->stock_quantity }})</span>
                                @else
                                    <span class="text-danger">Hết hàng</span>
                                @endif
                            </small>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5>Thông tin sách:</h5>
                        <p><strong>Tác giả:</strong> {{ $book->author }}</p>
                        <p><strong>Nhà xuất bản:</strong> {{ $book->publisher }}</p>
                        <p><strong>Thể loại:</strong> {{ $book->category->category_name }}</p>
                    </div>

                    <div class="mb-4">
                        <h5>Mô tả:</h5>
                        <p>{{ $book->description }}</p>
                    </div>

                    @if($book->stock_quantity > 0)
                    <form action="{{ route('cart.add', $book->book_id) }}" method="POST" class="d-flex align-items-center gap-3">
                        @csrf
                        <div class="input-group" style="width: 120px;">
                            <button class="btn btn-outline-secondary border-0" type="button" onclick="decrementQuantity()" 
                                    style="background: #f8f9fa; border-radius: 4px;">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="form-control text-center border-0" 
                                   name="quantity" id="quantity" value="1" min="1" 
                                   max="{{ $book->stock_quantity }}" 
                                   style="background: #f8f9fa;">
                            <button class="btn btn-outline-secondary border-0" type="button" onclick="incrementQuantity()"
                                    style="background: #f8f9fa; border-radius: 4px;">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill py-3 px-5">
                            <i class="fa fa-shopping-cart me-2"></i>Thêm vào giỏ
                        </button>
                    </form>

                    <script>
                    function incrementQuantity() {
                        var input = document.getElementById('quantity');
                        var max = parseInt(input.getAttribute('max'));
                        var value = parseInt(input.value);
                        if (value < max) {
                            input.value = value + 1;
                        }
                    }

                    function decrementQuantity() {
                        var input = document.getElementById('quantity');
                        var value = parseInt(input.value);
                        if (value > 1) {
                            input.value = value - 1;
                        }
                    }

                    // Ngăn người dùng nhập trực tiếp từ bàn phím
                    document.getElementById('quantity').addEventListener('keydown', function(e) {
                        e.preventDefault();
                    });
                    </script>
                    @else
                    <button class="btn btn-secondary rounded-pill py-3 px-5" disabled>
                        Hết hàng
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Thêm section Sách liên quan -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6 mb-4">Sách Liên Quan</h1>
        </div>
        <div class="row g-4">
            @foreach($book->category->books->where('book_id', '!=', $book->book_id)->take(4) as $relatedBook)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-item related-book d-flex flex-column bg-white rounded overflow-hidden h-100">
                    <div class="text-center p-4">
                        <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">
                            {{ number_format($relatedBook->price) }} VNĐ
                        </div>
                        <h5 class="mb-3">{{ Str::limit($relatedBook->title, 50) }}</h5>
                        <span>Tác giả: {{ $relatedBook->author }}</span>
                    </div>
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="{{ asset($relatedBook->image_url ?? 'frontend/img/product-default.jpg') }}" alt="{{ $relatedBook->title }}">
                        <div class="product-overlay">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle" href="{{ route('products.detail', $relatedBook->book_id) }}">
                                <i class="fa fa-eye text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .related-book {
        border: 2px solid transparent;
        transition: all 0.3s ease;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .related-book:hover {
        border-color: var(--primary);
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .related-book .product-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.3);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .related-book:hover .product-overlay {
        opacity: 1;
    }

    .related-book .btn-lg-square {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .related-book .btn-lg-square:hover {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .related-book .btn-lg-square:hover i {
        color: #fff !important;
    }
</style>

@endsection
