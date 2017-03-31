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
                'name' => 'user-list',
                'display_name' => 'User Show',
                'description' => 'View users list'
            ],
            [
                'name' => 'user-show',
                'display_name' => 'User Show',
                'description' => 'View account'
            ],
            [
                'name' => 'user-update',
                'display_name' => 'User Update',
                'description' => 'Update users'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'User Create',
                'description' => 'Create users'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'User Delete',
                'description' => 'Delete users'
            ],
            [
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Of Role'
            ],
            [
                'name' => 'role-manage',
                'display_name' => 'Manage Role',
                'description' => 'Create, Update, Delete a Role'
            ],
            [
                'name' => 'permission-manage',
                'display_name' => 'Manage Permission',
                'description' => 'Create, Update, Delete, View a Permission'
            ],
            [
                'name' => 'book-view',
                'display_name' => 'View Book List',
                'description' => 'See only Listing Of Book'
            ],
            [
                'name' => 'book-others',
                'display_name' => 'Other items',
                'description' => 'Manage Other items'
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
                'name' => 'promotion',
                'display_name' => 'promotion',
                'description' => 'Manage promotion'
            ],
            [
                'name' => 'export-excel',
                'display_name' => 'export book',
                'description' => 'Admin export book by excel'
            ],
            [
                'name' => 'import-book',
                'display_name' => 'Import book by excel',
                'description' => 'Admin import book by excel'
            ],
            [
                'name' => 'import-book-function',
                'display_name' => 'import book',
                'description' => 'Manage import book funtion'
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
