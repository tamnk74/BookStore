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
                'display_name' => 'Admin',
                'description' => 'Manage the system'
            ],
            [
                'name' => 'cashier',
                'display_name' => 'Cashier',
                'description' => 'Sell books'
            ],
            [
                'name' => 'storekeeper',
                'display_name' => 'Storekeeper',
                'description' => 'Manage books in store'
            ],
            [
                'name' => 'manager',
                'display_name' => 'BookStore Manager',
                'description' => 'Manage store'
            ]
        ];
        foreach ($roles as $key => $role) {
            Role::create($role);
        }
    }
}
