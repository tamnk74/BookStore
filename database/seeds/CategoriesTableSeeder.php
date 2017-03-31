<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Sách giáo khoa - Giáo trình', 'Sách ngoại ngữ', 'Sách chuyên ngành', 'Sách văn học trong nước', 'Sách văn học nước ngoài', 'Sách kinh tế',  'Quản trị lãnh đạo',
            'Sách thiếu nhi', 'Truyện tranh', 'Truyện ngắn', 'Sách phát triển bản thân', 'Tạp chí', 'Khác'];
        foreach ($categories as $category)
        DB::table('categories')->insert([
            'name' => $category
        ]);
    }
}
