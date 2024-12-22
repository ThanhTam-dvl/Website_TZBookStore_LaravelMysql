<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $book = Book::with(['category.books' => function($query) use ($id) {
            $query->where('books.book_id', '!=', $id)
                  ->where('books.stock_quantity', '>', 0)
                  ->take(4);
        }])->findOrFail($id);
        
        return view('frontend.products.product-detail', compact('book'));
    }
} 