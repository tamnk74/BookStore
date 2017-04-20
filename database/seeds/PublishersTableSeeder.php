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
        $publishers = [
            'NXB Kim Dong',
            'NXB Tuổi Trẻ',
            'NXB Kim Đồng',
            'name' => 'Khác'
        ];
        foreach($publishers as $publisher){
            Publisher::insert([
                'name' => $publisher,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
