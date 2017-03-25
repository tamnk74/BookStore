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
        $authors = ['Đức Anh', 'Đức A', 'Đusenko - Mantrekha', 'Đường Đạt Thiên', 'Đương Đạo', 'Đường Đắc Dương',
            'Đường Vinh Sường ', 'Đường Văn', 'Đường Tương Thanh', 'Đường Tuệ Linh', 'Đường Tiểu Lam', 'Đường Tiểu Hào',
            'Đường Thi', 'Đường Thất Công Tử', 'Đường Quân - Trương Dực - Vương Xuân Quang', 'Đường Quả Mạch Tử',
            'Đường Nhan Sinh-Bao Thúc Diễm', 'Đường Nhạn Sinh', 'Đường Nhan Sinh', 'Đường Nhân', 'Đường Minh Quân',
            'Đường LợiĐường LinhĐường KỳĐường Kiến QuânĐường Kiến HoaĐường Khánh HoaĐường HoaĐường Chí LongĐường BìnhĐườngĐức ĐôĐức Đạt-Lai Lạt-Ma XIVĐức Đạt-Lai Lạt-MaĐức VinhĐức ViệtĐức TùngĐức TuĐức TrườngĐức TrinhĐức TríĐức TĩnhĐức TínĐức TiếnĐức ThụĐức Thuần - Vũ ĐiềnĐức ThuậnĐức Thiện Đức Thành Đức Tấn Đức Tài Đức Sang- Hoàng An Đức Quang Đức Phương Đức Pháp Vương Gyalwang Drukpa Đời Thứ XII Đức Nga Đức Nam Đức Minh Đức Mân Đức Mẫn Đức Long Đức Lộc Đức Liên Đức Lê Đức Lâm Đức Huyền Đức Huy Đức Hùng Đức Hồng Y Bertram Đức Hoàng Đức Hiếu Đức Hiền Đức Hiển Đức Hạnh (biên soạn) Đức Hạnh Đức Hán Đức Hải Đức Dương Đức Dalai Lama Đức Cườnng Đức Cường Đức Bình Đức Anh (sưu tầm) Đức Anh (Sưu tầm & tuyển chọn) Đức Anh Đức - Huy (Sưu Tầm - Biên Soạn) Đu Đồ Đút Đỗ Đức Hiểu Đỗ Tường Linh Đỗ Thái Hư Đỗ Quyên Đỗ Phượng Hà Đỗ Nhật Nam Đỗ Minh Hùng Đỗ Lê Chi Đỗ Kim Trung Đỗ Khánh Hoan Đỗ Hữu Vinh Đỗ Hồng Ngọc Đỗ Hoàng Ly Đỗ Hoàng Linh Đỗ Cảnh Minh Đỗ Anh Thơ Đới Hiểu Huyên Đồng Trương Quán Đồng Trương Quân Đồng Hoa Đồng Xanh Đồng Vân Khanh Đồng Tử Đông Tử Đồng Tiểu Đồng Thị Vân Hồng Đồng Thị Thanh Phương Đổng Thanh Quang Đông Tây Đồng Quang Tiến Đổng Quân Đông Quách Tốn Đông Phương Tri Đông Phương Sóc Đông Phương Đông Phong Đồng Phi Phi Đông Nguyên Tập Đồng Ngọc Đức Đổng Ngọc Minh Đồng Nghệ Đông Nam Đông Mây Đông Mai Đông Ly Cúc Ẩn Đồng Loại Đồng Linh Đổng Lệ Yến Đồng Lâm Đông La Đồng Khắc Thái Đổng Hy Khổng - Diệp Trường Lạc- Trường Xuân Minh Đông Hương Đông Hoài Đồng Hoa Đông Hải Đông Hạ Đông Giang Đông Dã Quân Đông Châu Nguyễn Hữu Tiến'];
        DB::table('authors')->insert([
            'name' => 'BỘ GIÁO DỤC VÀ ĐÀO TẠO',
        ]);
        DB::table('authors')->insert([
            'name' => 'Văn Như Cương',
        ]);
        DB::table('authors')->insert([
            'name' => 'Ngô Tất Tố',
        ]);
        DB::table('authors')->insert([
            'name' => 'Cao Cự Giác',
        ]);
        DB::table('authors')->insert([
            'name' => 'Trần Phương',
        ]);
        DB::table('authors')->insert([
            'name' => 'Khác',
        ]);
    }
}
