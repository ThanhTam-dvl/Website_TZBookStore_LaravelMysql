@extends('layouts.login-layout')
@section('login')

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-start mb-4">
            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Quay lại trang chủ
            </a>
        </div>
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="text-primary text-uppercase mb-2 font-family-heading">// Đăng nhập</p>
            <h1 class="display-6 mb-4 font-family-heading">Vui lòng nhập email và mật khẩu để đăng nhập</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 wow fadeInUp" data-wow-delay="0.1s">
                <form method="POST" action="{{ route('login.post') }}" style="max-width: 450px;" class="mx-auto">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control font-family-body @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}"
                                       placeholder="Nhập email" required>
                                <label for="email" class="font-family-body">Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control font-family-body @error('password') is-invalid @enderror" 
                                       id="password" name="password"
                                       placeholder="Nhập mật khẩu" required>
                                <label for="password" class="font-family-body">Mật khẩu</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary rounded-pill py-3 px-5 font-family-body" 
                                    type="submit">
                                Đăng nhập
                            </button>
                        </div>
                        <div class="col-12 text-center">
                            <p class="mb-0 font-family-body">Chưa có tài khoản? 
                                <a href="{{ route('register') }}" class="text-primary">Đăng ký ngay</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection