@extends('layouts.frontend')
@section('content')


<!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('frontend/img/bacho.jpg')}}" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-primary text-uppercase fw-bold mb-2">// The best books</p>
                                <h1 class="display-1 text-light mb-4 animated slideInDown">Chúng tôi bán sách vì đam mê</h1>
                                <p class="text-light fs-5 mb-4 pb-3">Ở đây có bán tất tần tật các loại sách phát triển bản thân hay nhất. Bà con vào mà lựa =))</p>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('frontend/img/anh-cuon-sach-mo-ra-trong-thu-vien_051456791.jpg')}}" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-primary text-uppercase fw-bold mb-2">// The best books</p>
                                <h1 class="display-1 text-light mb-4 animated slideInDown">Chúng tôi bán sách vì đam mê</h1>
                                <p class="text-light fs-5 mb-4 pb-3">Ở đây có bán tất tần tật các loại sách phát triển bản thân hay nhất. Bà con vào mà lựa =))</p>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid rounded" src="{{asset('frontend/img/that-bai-de-thanh-cong.jpg')}}" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid rounded" src="{{asset('frontend/img/sach_hay_nen_doc_nha_gia_kim_ea63da0d8f.jpeg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6 mb-4">Đọc sách là đầu tư vào bản thân, và thành công là kết quả của sự đầu tư đó</h1>
                        <p>Chào mừng bạn đến với Tiệm Sách Phát Triển Bản Thân, nơi cung cấp những cuốn sách giúp bạn khám phá và phát triển tiềm năng của chính mình. Chúng tôi chuyên cung cấp các đầu sách về tư duy tích cực, kỹ năng sống, quản lý thời gian, lãnh đạo, và nhiều lĩnh vực khác giúp bạn nâng cao chất lượng cuộc sống và đạt được những mục tiêu cá nhân.</p>
                        <p>Chúng tôi ở đây bán sách là vì đam mê nhưng luôn bán bằng cả con tim và sự nhiệt huyết của chúng tôi.</p>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Uy tín
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Chất lượng
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Giá cả bao rẻ
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Chính sách đổi trả rõ ràng
                            </div>
                        </div>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Product Start -->
    <div class="container-xxl bg-light my-6 py-6 pt-0">
        <div class="container">
            <div class="bg-primary text-light rounded-bottom p-5 my-6 mt-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 text-light mb-0">The Best Book In Your City</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <div class="d-inline-flex align-items-center text-start">
                            <i class="fa fa-phone-alt fa-4x flex-shrink-0"></i>
                            <div class="ms-4">
                                <p class="fs-5 fw-bold mb-0">Call Us</p>
                                <p class="fs-1 fw-bold mb-0">0868713558</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">// Book Products</p>
                <h1 class="display-6 mb-4">Sách bán chạy</h1>
            </div>
            <div class="row g-4">
                @php
                    $books = App\Models\Book::orderBy('stock_quantity', 'asc')->take(6)->get();
                @endphp
                @foreach($books as $book)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                        <a href="{{ route('products.detail', $book->book_id) }}" class="text-decoration-none text-dark">
                            <div class="text-center p-4">
                                <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">
                                    {{ number_format($book->price) }} VNĐ
                                </div>
                                <h3 class="mb-3">{{ $book->title }}</h3>
                                <span>{{ Str::limit($book->description, 150) }}</span>
                            </div>
                            <div class="position-relative mt-auto">
                                <img class="img-fluid" src="{{ asset($book->image_url ?? 'frontend/img/product-default.jpg') }}" 
                                     alt="{{ $book->title }}">
                                <div class="product-overlay">
                                    <span class="btn btn-lg-square btn-outline-light rounded-circle">
                                        <i class="fa fa-eye text-primary"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Product End -->

    <!-- Testimonial Start -->
    <div class="container-xxl bg-light my-6 py-6 pb-0">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">// Reader Review</p>
                <h1 class="display-6 mb-4">Hơn +20000 khách hàng đã tin tưởng chúng tôi</h1>
            </div>

            
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="{{asset('frontend/img/customer-1.jpg')}}" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Mark Zuckerberg</h5>
                        </div>
                    </div>
                    <p class="mb-0">Sách ở đây thật sự tuyệt zời, nhờ nó mà tôi có được thành công như ngày hôm nay.</p>
                </div>
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="{{asset('/frontend/img/customer-2.jpg')}}" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Bill Gates</h5>
                        </div>
                    </div>
                    <p class="mb-0">"Hãy đọc thật nhiều và tìm kiếm một kỹ năng bạn nghĩ rằng có thể tạo ra tác động tích cực với thế giới"</p>
                </div>
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="{{asset('frontend/img/customer-4.jpg')}}" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Phạm Nhật Vượng</h5>
                        </div>
                    </div>
                    <p class="mb-0">Việc đọc sách không chỉ là học hỏi mà còn là một công cụ để phát triển bản thân và doanh nghiệp bền vững.</p>
                </div>
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="{{asset('frontend/img/customer-3.jpg')}}" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Cristiano Ronaldo</h5>
                        </div>
                    </div>
                    <p class="mb-0">Đọc sách là yếu tố không thể thiếu để duy trì đỉnh cao phong độ và tinh thần lạc quan.</p>
                </div>
            </div>
            <div class="bg-primary text-light rounded-top p-5 my-6 mb-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="display-4 text-light mb-0">Đăng kí để nhận thông báo mới nhất</h1>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="position-relative">
                            <input class="form-control bg-transparent border-light w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-dark py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Đăng kí</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

@endsection