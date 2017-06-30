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
        $books = [
            [
                'name' => 'Đại số 10',
                'author_id' => '1',
                'publisher_id' => '1',
                'price' => '30000',
                'front_cover' => 'dai_so_10.jpg',
                'back_cover' => 'dai_so_10.jpg',
                'category_id' => '1',
                'issuer_id' => '1',
                'type_id' => '1',
                'publishing_year' => '2010',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Đại số và giải tích 11',
                'author_id' => '1',
                'publisher_id' => '1',
                'price' => '30000',
                'front_cover' => 'dai_so_11.jpg',
                'back_cover' => 'dai_so_11.jpg',
                'category_id' => '1',
                'issuer_id' => '1',
                'type_id' => '1',
                'publishing_year' => '2010',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Giải tích 12',
                'author_id' => '1',
                'publisher_id' => '1',
                'price' => '30000',
                'front_cover' => 'giai_tich_12.jpg',
                'back_cover' => 'giai_tich_12.jpg',
                'category_id' => '1',
                'issuer_id' => '1',
                'type_id' => '1',
                'publishing_year' => '2010',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Vật lí 10',
                'author_id' => '1',
                'publisher_id' => '1',
                'price' => '12000',
                'front_cover' => 'vat_li_10.jpg',
                'back_cover' => 'vat_li_10.jpg',
                'category_id' => '2',
                'issuer_id' => '1',
                'type_id' => '1',
                'publishing_year' => '2010',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ];
        /*foreach ($books as $book){
            DB::table('books')->insert($book);
        }*/
    }
}
