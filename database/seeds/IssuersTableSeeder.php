<?php

use Illuminate\Database\Seeder;
use App\Models\Issuer;

class IssuersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $issuers = [
            'Trí Việt',
            'Hoa Học Trò'
        ];
        foreach ($issuers as $issuer)
            Issuer::create([
                'name' => $issuer,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
    }
}
