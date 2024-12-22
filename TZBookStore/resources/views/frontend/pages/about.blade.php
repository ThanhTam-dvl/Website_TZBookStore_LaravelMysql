@extends ('layouts.frontend')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

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



@endsection