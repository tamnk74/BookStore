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
