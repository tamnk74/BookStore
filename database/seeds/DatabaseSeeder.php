<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*level1
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
       */
        /*
         * level2
         * $this->call(ImportBooksTableSeeder::class);
         *
         */
        $this->call(BillsTableSeeder::class);
    }
}
