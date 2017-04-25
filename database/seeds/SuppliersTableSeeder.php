<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = [
            'Nhà sách Bạch Đằng',
            'Nhà sách Vina',
            'Nhà sách Tiki'
        ];
        foreach ($suppliers as $supplier)
            Supplier::create([
                'name' => $supplier,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
    }
}
