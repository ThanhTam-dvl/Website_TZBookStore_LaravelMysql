<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $cartItems = [];
        $total = 0;
        
        foreach($cart as $id => $details) {
            $book = Book::find($id);
            if($book) {
                $cartItems[] = [
                    'cart_item_id' => $id,
                    'title' => $book->title,
                    'price' => $book->price,
                    'quantity' => $details['quantity'],
                    'image_url' => $book->image_url,
                    'selected' => $details['selected'] ?? false
                ];
                if($details['selected'] ?? false) {
                    $total += $book->price * $details['quantity'];
                }
            }
        }
        
        return view('frontend.pages.shoppingcart', compact('cartItems', 'total'));
    }

    public function add(Request $request, $book_id)
    {
        $book = Book::findOrFail($book_id);
        $cart = session()->get('cart', []);
        
        if(isset($cart[$book_id])) {
            $cart[$book_id]['quantity'] += $request->quantity ?? 1;
        } else {
            $cart[$book_id] = [
                'quantity' => $request->quantity ?? 1
            ];
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function update(Request $request, $book_id)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$book_id])) {
            $cart[$book_id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        
        return response()->json(['success' => true]);
    }

    public function remove($book_id)
{
    try {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$book_id])) {
            unset($cart[$book_id]);
            session()->put('cart', $cart);
            
            return response()->json([
                'success' => true,
                'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng!'
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy sản phẩm trong giỏ hàng!'
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Có lỗi xảy ra khi xóa sản phẩm!'
        ]);
    }
}

    public function updateSelected(Request $request, $book_id)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$book_id])) {
            $cart[$book_id]['selected'] = $request->selected;
            session()->put('cart', $cart);
        }
        
        $total = 0;
        foreach($cart as $id => $details) {
            $book = Book::find($id);
            if($book && ($details['selected'] ?? false)) {
                $total += $book->price * $details['quantity'];
            }
        }
        
        return response()->json([
            'success' => true,
            'total' => $total,
            'total_formatted' => number_format($total) . 'đ'
        ]);
    }
} 