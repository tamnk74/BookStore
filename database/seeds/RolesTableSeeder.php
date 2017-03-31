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
                'name' => 'guest',
                'display_name' => 'Guest',
                'description' => 'Guest visit the system'
            ]
        ];
        foreach ($roles as $key => $role) {
            Role::create($role);
        }
    }
}
