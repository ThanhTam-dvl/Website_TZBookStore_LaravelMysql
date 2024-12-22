<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    use HasFactory;

    protected $table = 'book_reviews';
    protected $primaryKey = 'review_id';
    protected $fillable = ['book_id', 'user_id', 'rating', 'review_text'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
