<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookCategory;

class BookCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'category_name' => 'Văn học',
                'description' => 'Sách văn học trong và ngoài nước'
            ],
            [
                'category_name' => 'Phát triển bản thân',
                'description' => 'Sách về kinh tế, kinh doanh'
            ],
            [
                'category_name' => 'Kỹ năng sống',
                'description' => 'Sách về kỹ năng sống, phát triển bản thân'
            ],
            // Thêm các category khác
        ];

        foreach ($categories as $category) {
            BookCategory::create($category);
        }
    }
} 