<?php

use Illuminate\Database\Seeder;
use App\Models\PermissionRole;

class PermissionRoleTableSeeder extends Seeder
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
                'role_id' => '1',//ADMIN
                'permission_id' => '1'
            ],
            [
                'role_id' => '1',
                'permission_id' => '2'
            ],
            [
                'role_id' => '1',
                'permission_id' => '3'
            ],
            [
                'role_id' => '1',
                'permission_id' => '4'
            ],
            [
                'role_id' => '1',
                'permission_id' => '5'
            ],
            [
                'role_id' => '1',
                'permission_id' => '6'
            ],
            [
                'role_id' => '1',
                'permission_id' => '7'
            ],
            [
                'role_id' => '1',
                'permission_id' => '8'
            ],
            [
                'role_id' => '1',
                'permission_id' => '9'
            ],
            [
                'role_id' => '1',
                'permission_id' => '10'
            ],
            [
                'role_id' => '2',//Cashier
                'permission_id' => '5'
            ],
            [
                'role_id' => '2',
                'permission_id' => '6'
            ],
            [
                'role_id' => '3',//Storekeeper
                'permission_id' => '4'
            ],
            [
                'role_id' => '3',
                'permission_id' => '6'
            ],
            [
                'role_id' => '3',
                'permission_id' => '8'
            ],
            [
                'role_id' => '3',
                'permission_id' => '9'
            ],
            [
                'role_id' => '4',//Quản lí
                'permission_id' => '1'
            ],
            [
                'role_id' => '4',
                'permission_id' => '6'
            ],
            [
                'role_id' => '4',
                'permission_id' => '10'
            ]
        ];
        foreach ($roles as $key => $role) {
            PermissionRole::create($role);
        }
    }
}
