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
        DB::table('categories')->insert([
            'name' => 'Toán học'
        ]);
        DB::table('categories')->insert([
            'name' => 'Vật lí'
        ]);
        DB::table('categories')->insert([
            'name' => 'Hóa học'
        ]);
        DB::table('categories')->insert([
            'name' => 'Văn học - Xã hội'
        ]);
        DB::table('categories')->insert([
            'name' => 'Khác'
        ]);
    }
}
