<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = ['BỘ GIÁO DỤC VÀ ĐÀO TẠO', 'Cao Cự Giác', 'Đức Anh', 'Đức A', 'Đusenko - Mantrekha', 'Đường Đạt Thiên', 'Đương Đạo', 'Đường Đắc Dương',
            'Đường Vinh Sường ', 'Đường Văn', 'Đường Tương Thanh', 'Đường Tuệ Linh', 'Đường Tiểu Lam', 'Đường Tiểu Hào',
            'Đường Thi', 'Đường Thất Công Tử', 'Đường Quân - Trương Dực - Vương Xuân Quang', 'Đường Quả Mạch Tử',
            'Đường Nhan Sinh-Bao Thúc Diễm', 'Đường Nhạn Sinh', 'Đường Nhan Sinh', 'Đường Nhân', 'Đường Minh Quân',
            'Đường Lợi', 'Đường Linh', 'Đường Kỳ', 'Đường Kiến Quân', 'Đường Kiến Hoa', 'Đường Khánh Hoa', 'Đường Hoa',
             'Đường Chí Long', 'Đường Bình', 'Ngô Tất Tố', 'Trần Phương', 'Văn Như Cương', 'Khác'];
        foreach ($authors as $author)
        DB::table('authors')->insert([
            'name' => $authors
        ]);
    }
}
