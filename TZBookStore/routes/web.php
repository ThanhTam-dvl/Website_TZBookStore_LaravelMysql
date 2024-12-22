<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\HeaderController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Backend\ProductController as BackendProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\OrderController as BackendOrderController;
// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('header', [HeaderController::class, 'index'])->name('header');
Route::get('about', function() { return view('frontend.pages.about');})->name('about');
Route::get('contact', function() { return view('frontend.pages.contact');})->name('contact');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Order Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/orders/history', [OrderController::class, 'history'])->name('order.history');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/success', [OrderController::class, 'success'])->name('order.success');
    Route::get('/orders/{order_id}', [OrderController::class, 'detail'])->name('order.detail');
    Route::post('/orders/{order_id}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');
});

// Admin Routes
Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        // Product Routes
        Route::get('/products', [BackendProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [BackendProductController::class, 'create'])->name('products.create');
        Route::post('/products', [BackendProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}/edit', [BackendProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [BackendProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [BackendProductController::class, 'destroy'])->name('products.destroy');
        Route::post('/products/delete-multiple', [BackendProductController::class, 'destroyMultiple'])->name('products.destroy-multiple');

        // Category Routes
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // Order Routes
        Route::get('/orders', [BackendOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}/edit', [BackendOrderController::class, 'edit'])->name('orders.edit');
        Route::put('/orders/{id}', [BackendOrderController::class, 'update'])->name('orders.update');
        Route::post('/orders/{id}/handle-cancellation', [BackendOrderController::class, 'handleCancellation'])
            ->name('orders.handle-cancellation');

        // Account Routes
        Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
        Route::post('/accounts', [AccountController::class, 'store'])->name('accounts.store');
        Route::put('/accounts/{id}', [AccountController::class, 'update'])->name('accounts.update');
        Route::delete('/accounts/{id}', [AccountController::class, 'destroy'])->name('accounts.destroy');
    });

// Products Routes
Route::get('products/{category_id}', [ProductController::class, 'getProductsByCategory'])
    ->name('products.category');
Route::get('product/{book_id}', [ProductController::class, 'showProductDetail'])
    ->name('products.detail');

// Cart Routes
Route::prefix('cart')->group(function() {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('/add/{book_id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/remove/{book_id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/update/{book_id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/update-selected/{book_id}', [CartController::class, 'updateSelected'])->name('cart.updateSelected');
});

Route::get('/debug', function() {
    dd([
        'categories' => \App\Models\BookCategory::all()->toArray(),
        'books' => \App\Models\Book::all()->toArray(),
        'total_categories' => \App\Models\BookCategory::count(),
        'total_books' => \App\Models\Book::count()
    ]);
});

Route::get('/test-db', function() {
    try {
        \DB::connection()->getPdo();
        echo "Kết nối database thành công!";
        
        // Test truy vấn bảng book_categories
        $categories = \DB::table('book_categories')->get();
        dd($categories);
    } catch (\Exception $e) {
        die("Không thể kết nối database. Lỗi: " . $e->getMessage());
    }
});
