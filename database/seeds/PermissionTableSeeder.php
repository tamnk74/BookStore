<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
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
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Of Role'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'book-view',
                'display_name' => 'Display Book Listing',
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
