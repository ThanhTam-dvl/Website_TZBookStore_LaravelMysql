<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCategory;

class ProductController extends Controller
{
    public function getProductsByCategory($category_id)
    {
        $category = BookCategory::findOrFail($category_id);
        $products = Book::where('category_id', $category_id)->paginate(12);
        
        return view('frontend.products.product', compact('products', 'category'));
    }

    public function showProductDetail($book_id)
    {
        $book = Book::with(['category.books' => function($query) use ($book_id) {
            $query->where('books.book_id', '!=', $book_id)
                  ->where('books.stock_quantity', '>', 0)
                  ->take(4);
        }])->findOrFail($book_id);
        
        return view('frontend.products.product-detail', compact('book'));
    }
} 