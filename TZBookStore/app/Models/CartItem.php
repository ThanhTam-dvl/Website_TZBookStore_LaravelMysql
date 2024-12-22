<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';
    protected $primaryKey = 'cart_item_id';
    protected $fillable = ['book_id', 'user_id', 'quantity'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
