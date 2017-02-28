<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => 'Đại số 10',
            'author_id' => '1',
            'publish_id' => '1',
            'price' => '30000',
            'image' => '',
            'category_id' => '1',
            'type_id' => '1',
            'publishing_year' => '2010'
        ]);
        DB::table('books')->insert([
            'name' => 'Đại số 11',
            'author_id' => '1',
            'publish_id' => '1',
            'price' => '30000',
            'image' => '',
            'category_id' => '1',
            'type_id' => '1',
            'publishing_year' => '2010'
        ]);
        DB::table('books')->insert([
            'name' => 'Đại số 12',
            'author_id' => '1',
            'publish_id' => '1',
            'price' => '30000',
            'image' => '',
            'category_id' => '1',
            'type_id' => '1',
            'publishing_year' => '2010'
        ]);
        DB::table('books')->insert([
            'name' => 'Vật lí 10',
            'author_id' => '1',
            'publish_id' => '1',
            'price' => '30000',
            'image' => '',
            'category_id' => '2',
            'type_id' => '1',
            'publishing_year' => '2010'
        ]);
    }
}
