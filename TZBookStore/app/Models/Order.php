<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    const UPDATED_AT = null;
    
    protected $fillable = [
        'user_id',
        'customer_name',
        'email',
        'phone',
        'address',
        'payment_method',
        'order_notes',
        'total_amount',
        'status'
    ];

    protected $dates = [
        'created_at'
    ];

    protected $attributes = [
        'status' => 'pending'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    public function getStatusTextAttribute()
    {
        return [
            'pending' => 'Chờ xác nhận',
            'processing' => 'Đang xử lý',
            'shipping' => 'Đang giao hàng',
            'completed' => 'Đã giao hàng',
            'cancelled' => 'Đã hủy',
            'cancel_requested' => 'Yêu cầu hủy'
        ][$this->status] ?? $this->status;
    }

    public function getStatusBadgeAttribute()
    {
        return [
            'pending' => 'bg-warning',
            'processing' => 'bg-info',
            'shipping' => 'bg-primary',
            'completed' => 'bg-success',
            'cancelled' => 'bg-danger',
            'cancel_requested' => 'bg-secondary'
        ][$this->status] ?? 'bg-secondary';
    }
}
