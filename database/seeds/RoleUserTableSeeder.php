<?php

use Illuminate\Database\Seeder;
use App\Models\RoleUser;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'role_id' => '1',
                'user_id' => '1'
            ],
            [
                'role_id' => '2',
                'user_id' => '2'
            ],
            [
                'role_id' => '3',
                'user_id' => '3'
            ],
            [
                'role_id' => '4',
                'user_id' => '4'
            ]
        ];
        foreach ($roles as $key => $role) {
            RoleUser::create($role);
        }
    }
}
