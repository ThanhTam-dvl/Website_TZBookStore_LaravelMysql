<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCategory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Book::all();
        $categories = BookCategory::all();
        return view('backend.products.manage-product', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = BookCategory::all();
        return view('backend.products.add-product', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'category_id' => 'required|exists:book_categories,category_id',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'image_url' => 'nullable|url',
            'publisher' => 'nullable|max:255',
            'description' => 'nullable',
            'published_date' => 'nullable|date'
        ]);

        Book::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được thêm thành công.');
    }

    public function edit($id)
    {
        $product = Book::findOrFail($id);
        $categories = BookCategory::all();
        return view('backend.products.edit-product', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'category_id' => 'required|exists:book_categories,category_id',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'image_url' => 'nullable|url',
            'publisher' => 'nullable|max:255',
            'description' => 'nullable',
            'published_date' => 'nullable|date'
        ]);

        $product = Book::findOrFail($id);
        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $product = Book::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được xóa thành công.');
    }

    public function destroyMultiple(Request $request)
    {
        $ids = $request->ids;
        if (!$ids) {
            return redirect()->back()->with('error', 'Vui lòng chọn sản phẩm để xóa.');
        }

        Book::whereIn('book_id', $ids)->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Các sản phẩm đã chọn đã được xóa thành công.');
    }
} 