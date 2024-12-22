<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'book_id';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'category_id',
        'author',
        'publisher',
        'description',
        'price',
        'stock_quantity',
        'image_url',
        'published_date'
    ];

    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'category_id', 'category_id');
    }
}
