<?php

use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::insert([
            'name' => 'NXB Kim Dong'
        ]);
        Publisher::insert([
            'name' => 'NXB Tuổi Trẻ'
        ]);
        Publisher::insert([
            'name' => 'NXB Kim Đồng'
        ]);
        Publisher::insert([
            'name' => 'Khác'
        ]);
    }
}
