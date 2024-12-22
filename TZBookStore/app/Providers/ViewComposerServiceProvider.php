<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\BookCategory;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('frontend.components.header', function ($view) {
            // Lấy route hiện tại
            $currentRoute = \Route::currentRouteName();
            
            // Danh sách các route không hiển thị topbar
            $hideTopbarRoutes = [
                'order.detail',
                'order.history', 
                'order.checkout',
                'cart',
                'products.detail'
            ];
            
            // Kiểm tra xem có nên ẩn topbar không
            $hideTopbar = in_array($currentRoute, $hideTopbarRoutes);
            
            $categories = BookCategory::all();
            
            $view->with([
                'categories' => $categories,
                'hideTopbar' => $hideTopbar
            ]);
        });
    }
} 