<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng trống!');
        }

        $orderItems = [];
        $totalAmount = 0;

        foreach($cart as $id => $details) {
            if($details['selected'] ?? false) {
                $book = Book::find($id);
                if($book) {
                    $orderItems[] = [
                        'book' => $book,
                        'quantity' => $details['quantity'],
                        'subtotal' => $book->price * $details['quantity']
                    ];
                    $totalAmount += $book->price * $details['quantity'];
                }
            }
        }

        if(empty($orderItems)) {
            return redirect()->route('cart')->with('error', 'Vui lòng chọn sản phẩm để đặt hàng!');
        }

        return view('frontend.orders.order', compact('orderItems', 'totalAmount'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'paymentMethod' => 'required|in:1,2,3',
            'notes' => 'nullable|string'
        ]);

        $cart = session()->get('cart', []);
        if(empty($cart)) {
            return back()->with('error', 'Giỏ hàng trống!');
        }

        $totalAmount = 0;
        foreach($cart as $id => $details) {
            if($details['selected'] ?? false) {
                $book = Book::find($id);
                if($book) {
                    $totalAmount += $book->price * $details['quantity'];
                }
            }
        }

        $order = new Order();
        $order->user_id = Auth::id();
        $order->customer_name = $validated['fullName'];
        $order->email = $validated['email'];
        $order->phone = $validated['phone'];
        $order->address = $validated['address'];
        $order->payment_method = $validated['paymentMethod'];
        $order->order_notes = $validated['notes'];
        $order->total_amount = $totalAmount;
        $order->status = 'pending';
        $order->save();

        foreach($cart as $id => $details) {
            if($details['selected'] ?? false) {
                $book = Book::find($id);
                if($book) {
                    OrderItem::create([
                        'order_id' => $order->order_id,
                        'book_id' => $book->book_id,
                        'quantity' => $details['quantity'],
                        'price' => $book->price,
                        'subtotal' => $book->price * $details['quantity']
                    ]);
                }
            }
        }

        session()->forget('cart');

        return redirect()->route('order.detail', $order->order_id)
            ->with('success', 'Đặt hàng thành công!');
    }

    public function history()
    {
        $orders = Order::with(['items.book'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('frontend.orders.order-history', compact('orders'));
    }

    public function detail($order_id)
    {
        $order = Order::with(['items.book'])
            ->where('user_id', Auth::id())
            ->findOrFail($order_id);

        return view('frontend.orders.order-detail', compact('order'));
    }

    public function cancel($order_id)
    {
        $order = Order::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->findOrFail($order_id);

        $order->update(['status' => 'cancelled']);

        return redirect()->route('order.history')
            ->with('success', 'Đơn hàng đã được hủy thành công.');
    }

    public function success()
    {
        return view('frontend.orders.order-success');
    }
} 