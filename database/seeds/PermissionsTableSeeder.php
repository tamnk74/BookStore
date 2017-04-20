<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'user-manager',
                'display_name' => 'Manage User',
                'description' => 'View users list'
            ],
            [
                'name' => 'role-manager',
                'display_name' => 'Manage Role',
                'description' => 'Create, Update, Delete a Role'
            ],
            [
                'name' => 'permission-manage',
                'display_name' => 'Manage Permission',
                'description' => 'Create, Update, Delete, View a Permission'
            ],
            [
                'name' => 'book',
                'display_name' => 'View Book List',
                'description' => 'See only Listing Of Book'
            ],
            [
                'name' => 'bill',
                'display_name' => 'Bill',
                'description' => 'Manage Bill'
            ],
            [
                'name' => 'store-view',
                'display_name' => 'store',
                'description' => 'see store'
            ],
            [
                'name' => 'import-book',
                'display_name' => 'Import book by excel',
                'description' => 'Admin import book by excel'
            ],
            [
                'name' => 'other-items',
                'display_name' => 'others items',
                'description' => 'Manage Other Items'
            ],
            [
                'name' => 'statistic',
                'display_name' => 'See Statistic',
                'description' => 'See Statistic'
            ]
        ];
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
