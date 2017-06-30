<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
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
                'name' => 'admin',
                'display_name' => 'Quản trị viên',
                'description' => 'Manage the system'
            ],
            [
                'name' => 'Nhân viên bán hàng',
                'display_name' => 'Cashier',
                'description' => 'Sell books'
            ],
            [
                'name' => 'storekeeper',
                'display_name' => 'Thủ kho',
                'description' => 'Manage books in store'
            ],
            [
                'name' => 'Quản lí',
                'display_name' => 'BookStore Manager',
                'description' => 'Manage store'
            ]
        ];
        foreach ($roles as $key => $role) {
            Role::create($role);
        }
    }
}
