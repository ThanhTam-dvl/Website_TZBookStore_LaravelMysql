<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('book_categories', function (Blueprint $table) {
            $table->bigIncrements('category_id');
            $table->string('category_name', 100);
            $table->text('description')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_categories');
    }
}; 