<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['items.book'])->get();
        return view('backend.orders.manage-order', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::with(['items.book'])->findOrFail($id);
        return view('backend.orders.edit-order', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipping,completed,cancelled'
        ]);

        $order->update($validated);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }

    public function handleCancellation(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $approved = $request->input('approved', false);

        if ($approved) {
            $order->update(['status' => 'cancelled']);
            $message = 'Đơn hàng đã được hủy thành công.';
        } else {
            $order->update(['status' => 'processing']);
            $message = 'Yêu cầu hủy đơn hàng đã bị từ chối.';
        }

        return redirect()->back()->with('success', $message);
    }
} 