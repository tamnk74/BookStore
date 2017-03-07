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
        DB::table('types')->insert([
            'name' => 'Sách giáo khoa'
        ]);
        DB::table('types')->insert([
            'name' => 'Sách tham khảo'
        ]);
        DB::table('types')->insert([
            'name' => 'Khác'
        ]);
        
    }
}
