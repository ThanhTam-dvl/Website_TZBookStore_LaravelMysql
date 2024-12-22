<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('stock_quantity', 'asc')
            ->take(6)
            ->get();

        return view('frontend.pages.home', compact('books'));
    }
}
