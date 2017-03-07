<?php

use Illuminate\Database\Seeder;

class PublishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishes')->insert([
            'name' => 'NXB Kim Dong'
        ]);
        DB::table('publishes')->insert([
            'name' => 'NXB Tuổi Trẻ'
        ]);
        DB::table('publishes')->insert([
            'name' => 'NXB Kim Đồng'
        ]);
        DB::table('publishes')->insert([
            'name' => 'Khác'
        ]);
    }
}
