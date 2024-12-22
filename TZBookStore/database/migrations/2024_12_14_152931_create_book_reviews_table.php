<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('book_reviews', function (Blueprint $table) {
            $table->id('review_id');
            $table->foreignId('book_id')->constrained('books', 'book_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->integer('rating')->nullable();
            $table->text('review_text')->nullable();
            $table->timestamp('review_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_reviews');
    }
};
