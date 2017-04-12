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
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(PublishersTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(ImportBooksTableSeeder::class);
    }
}
