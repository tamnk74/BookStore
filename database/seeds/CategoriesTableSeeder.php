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
        $categories = [
            'Khoa học cơ bản',
            'Khoa học kỹ thuật',
            'Khoa học xã hội',
            'Lịch sử địa lí',
            'Chính trị, Triết học',
            'Kinh tế',
            'Công nghệ thông tin',
            'Cơ khí',
            'Mĩ thuật Kiến trúc',
            'Xây dựng',
            'Tin học',
            'Văn hóa nghệ thuật',
            'Thời trang',
            'Ẩm thực',
            'Tôn giáo',
            'Thể thao',
            'Y học Sức khỏe',
            'Quản trị lãnh đạo',
            'Đạo đức, lối sống',
            'Khác'];
        foreach ($categories as $category)
        DB::table('categories')->insert([
            'name' => $category,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
