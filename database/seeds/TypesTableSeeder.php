<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types =[
            'Sách giáo khoa',
            'Sách tham khảo',
            'Tiểu thuyết',
            'Truyện tranh',
            'Truyện ngắn',
            'Sách thiếu nhi',
            'Sách ngoại ngữ',
            'Sách chuyên ngành',
            'Sách văn học trong nước',
            'Sách văn học nước ngoài',
            'Sách kinh tế',
            'Tạp chí',
            'Khác'
        ];
        foreach ($types as $type)
        DB::table('types')->insert([
            'name' => $type,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

    }
}
