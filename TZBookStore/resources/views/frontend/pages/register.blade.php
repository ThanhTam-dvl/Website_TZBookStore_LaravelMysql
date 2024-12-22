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
            <p class="text-primary text-uppercase mb-2 font-family-heading">// Đăng ký</p>
            <h1 class="display-6 mb-4 font-family-heading">Vui lòng điền thông tin để đăng ký</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 wow fadeInUp" data-wow-delay="0.1s">
                <form style="max-width: 450px;" class="mx-auto" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control font-family-body @error('full_name') is-invalid @enderror" 
                                       id="full_name" name="full_name"
                                       value="{{ old('full_name') }}"
                                       placeholder="Nhập họ tên" required>
                                <label for="full_name" class="font-family-body">Họ và tên</label>
                                @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control font-family-body @error('username') is-invalid @enderror" 
                                       id="username" name="username"
                                       value="{{ old('username') }}"
                                       placeholder="Nhập tên đăng nhập" required>
                                <label for="username" class="font-family-body">Tên đăng nhập</label>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control font-family-body @error('email') is-invalid @enderror" 
                                       id="email" name="email"
                                       value="{{ old('email') }}"
                                       placeholder="Nhập email" required>
                                <label for="email" class="font-family-body">Email</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
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
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control font-family-body @error('password_confirmation') is-invalid @enderror" 
                                       id="password_confirmation" name="password_confirmation"
                                       placeholder="Xác nhận mật khẩu" required>
                                <label for="password_confirmation" class="font-family-body">Xác nhận mật khẩu</label>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if(session('error'))
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            </div>
                        @endif
                        <div class="col-12 text-center">
                            <button class="btn btn-primary rounded-pill py-3 px-5 font-family-body" 
                                    type="submit">
                                Đăng ký
                            </button>
                        </div>
                        <div class="col-12 text-center">
                            <p class="mb-0 font-family-body">Đã có tài khoản? 
                                <a href="{{ route('login') }}" class="text-primary">Đăng nhập</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  

@endsection