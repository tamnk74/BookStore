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
                'name' => 'user-manager',//1
                'display_name' => 'Manage User',
                'description' => 'View users list'
            ],
            [
                'name' => 'role-manager',//2
                'display_name' => 'Manage Role',
                'description' => 'Create, Update, Delete a Role'
            ],
            [
                'name' => 'permission-manage',//3
                'display_name' => 'Manage Permission',
                'description' => 'Create, Update, Delete, View a Permission'
            ],
            [
                'name' => 'book',//4
                'display_name' => 'Book Manager',
                'description' => 'See only Listing Of Book'
            ],
            [
                'name' => 'bill',//5
                'display_name' => 'Bill',
                'description' => 'Manage Bill'
            ],
            [
                'name' => 'store-view',//6
                'display_name' => 'store',
                'description' => 'see store'
            ],
            [
                'name' => 'import-book',//7
                'display_name' => 'Import book by excel',
                'description' => 'Admin import book by excel'
            ],
            [
                'name' => 'other-items',//8
                'display_name' => 'others items',
                'description' => 'Manage Other Items'
            ],
            [
                'name' => 'statistic',//9
                'display_name' => 'See Statistic',
                'description' => 'See Statistic'
            ]
        ];
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
