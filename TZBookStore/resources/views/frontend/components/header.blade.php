<style>
/* CSS mặc định cho navbar */
.navbar {
    background: transparent;
    transition: all 0.3s ease-in-out;
}

/* CSS cho navbar khi không có topbar hoặc khi scroll */
.navbar.no-topbar,
.navbar.navbar-scrolled {
    background: var(--dark);
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

/* Ẩn account menu trên desktop */
.account-menu {
    display: none;
}

/* Styling cho account name và dropdown */
.user-greeting {
    cursor: pointer;
    color: #fff;
}

#account-name {
    display: none;
    margin-left: 0.5rem;
}

/* Hiển thị tên khi dropdown được mở */
.show #account-name {
    display: inline !important;
}

.user-dropdown {
    min-width: 200px;
    padding: 0.5rem 0;
}

.dropdown-menu li {
    list-style: none;
    padding-left: 0;
}

/* CSS cho màn hình dưới 991px */
@media (max-width: 991.98px) {
    .navbar {
        background: var(--dark);
    }

    .account-menu {
        display: block;
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1030;
    }

    .navbar-brand {
        position: absolute;
        left: 47%;
        transform: translateX(-50%);
        margin: 0;
    }

    .navbar-toggler {
        margin-left: auto;
    }

    #navbarCollapse {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--dark);
        padding: 1rem;
    }

    #account-logo {
        display: block;
    }
}

/* Ẩn logo account khi có topbar */
.topbar-visible #account-logo {
    display: none;
}
</style>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');

    // Kiểm tra nếu `hideTopbar` đang được bật
    @if($hideTopbar)
        navbar.classList.add('no-topbar');
    @endif

    // Thêm class khi scroll
    window.addEventListener('scroll', function() {
        if (window.scrollY > 0) {
            navbar.classList.add('navbar-scrolled');
        } else {
            @if(!$hideTopbar)
                navbar.classList.remove('navbar-scrolled');
            @endif
        }
    });
});
</script>


<!-- Topbar Start -->
@if(!$hideTopbar)
<div class="container-fluid top-bar bg-dark text-light px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <div class="d-inline-flex align-items-center">
                <!-- Hiển thị nút đăng ký/đăng nhập khi chưa đăng nhập -->
                @guest
                    <div class="auth-buttons">
                        <a class="btn auth-btn auth-btn-register me-3" href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-2"></i>Đăng ký
                        </a>
                        <a class="btn auth-btn auth-btn-login" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-2"></i>Đăng nhập
                        </a>
                    </div>
                @endguest
                
                <!-- Hiển thị thông tin user và nút đăng xuất khi đã đăng nhập -->
                @auth
                    <div class="user-info d-flex align-items-center">
                        <div class="dropdown">
                            <span class="user-greeting me-3 dropdown-toggle" 
                                  role="button"
                                  data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                <i class="fas fa-user-circle me-2"></i>
                                {{ Auth::user()->full_name }}
                            </span>
                            <ul class="dropdown-menu dropdown-menu-end user-dropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('order.history') }}">
                                        <i class="fas fa-history me-2"></i>Lịch sử đơn hàng
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <div class="h-100 d-inline-flex align-items-center wrapper">
                <a class="btn-lg-square text-primary border-end rounded-0 icon icon-f" href="https://www.facebook.com/thanhtam.100604"><i class="fab fa-facebook-f"></i></a>
                <a class="btn-lg-square text-primary border-end rounded-0 icon icon-g" href="https://github.com/ThanhTam-dvl"><i class="fab fa-github"></i></a>
                <a class="btn-lg-square text-primary border-end rounded-0 icon icon-l" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="btn-lg-square text-primary pe-0 icon icon-i" href="https://www.instagram.com/thtam_106"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->
@endif

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="account-menu">
        @guest
            <a class="btn auth-btn auth-btn-login" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt"></i>
            </a>
        @endguest
        
        @auth
            <div class="dropdown">
                <span class="user-greeting" 
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    id="account-logo">
                    <i class="fas fa-user-circle"></i>
                    <span id="account-name">{{ Auth::user()->full_name }}</span>
                </span>
                <ul class="dropdown-menu dropdown-menu-end user-dropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('order.history') }}">
                            <i class="fas fa-history me-2"></i>Lịch sử đơn hàng
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
        @endauth
    </div>

    <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0">
        <h1 class="text-primary m-0">TZ BookStore</h1>
    </a>

    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto p-4 p-lg-0">
            <a class="nav-item nav-link {{ Request::routeIs('home') ? 'active' : '' }}" 
               href="{{ route('home') }}">Home</a>
            
            <a class="nav-item nav-link {{ Request::routeIs('about') ? 'active' : '' }}" 
               href="{{ route('about') }}">About</a>
            
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('products/*') ? 'active' : '' }}" 
                   data-bs-toggle="dropdown">Categories</a>
                <div class="dropdown-menu m-0">
                    @foreach($categories as $category)
                        <a class="dropdown-item {{ Request::is('products/'.$category->category_id) ? 'active' : '' }}"
                           href="{{ route('products.category', $category->category_id) }}">
                           {{ $category->category_name }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            <a class="nav-item nav-link {{ Request::routeIs('contact') ? 'active' : '' }}" 
               href="{{ route('contact') }}">Contact</a>
        </div>
        <div class="d-inline-flex align-items-center ms-lg-auto">
            <!-- Cart Button -->
            <a href="{{ route('cart') }}" class="btn btn-light text-dark cart-btn ms-3 position-relative">
                <i class="fas fa-shopping-cart fa-lg"></i> 
                <span class="cart-text ms-2">Giỏ hàng</span>
                <!-- Badge -->
                @if(Session::has('cart') && count(Session::get('cart')) > 0)
                    <span class="badge bg-danger text-light rounded-pill position-absolute top-0 start-100 translate-middle">
                        {{ count(Session::get('cart')) }}
                    </span>
                @endif
            </a>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    const accountDropdown = document.querySelector('.account-menu .dropdown');
    
    @if($hideTopbar)
        navbar.classList.add('no-topbar');
    @endif

    // Thêm class khi scroll
    window.addEventListener('scroll', function() {
        if (window.scrollY > 0) {
            navbar.classList.add('navbar-scrolled');
        } else {
            @if(!$hideTopbar)
                navbar.classList.remove('navbar-scrolled');
            @endif
        }
    });

    // Bootstrap 5 event listener cho dropdown
    if(accountDropdown) {
        accountDropdown.addEventListener('show.bs.dropdown', function () {
            document.querySelector('#account-name').style.display = 'inline';
        });

        accountDropdown.addEventListener('hide.bs.dropdown', function () {
            document.querySelector('#account-name').style.display = 'none';
        });
    }
});
</script>