<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookCategory;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|max:255|unique:book_categories'
        ]);

        BookCategory::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Danh mục đã được thêm thành công.');
    }

    public function destroy($id)
    {
        $category = BookCategory::findOrFail($id);
        
        // Kiểm tra xem danh mục có sản phẩm không
        if ($category->books()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Không thể xóa danh mục này vì có sản phẩm đang sử dụng.');
        }

        $category->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Danh mục đã được xóa thành công.');
    }
} 