<?php

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Supplier;
use App\Models\Store;

class ImportBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = 60*60*24*5;
        $books_id = Book::get()->pluck('id');
        $suppliers_id = Supplier::get()->pluck('id');
        $user_id = 1;
        if(count($books_id) == 0) return;
        for($time = strtotime("2016-01-01"); $time < time(); $time+=$date){
            for($i=0; $i< 20; $i++){
                $book_id = $books_id[rand(0, count($books_id)-1)];
                $book = Book::find($book_id)->first();
                $amount = rand(1, 5)*10;
                $price = $amount*($book->price*((100-$book->sale)/100)*rand(40, 50)/100);
                $supplier_id = $suppliers_id[rand(0, count($suppliers_id)-1)];
                $created_at = date('Y-m-d H:i:s', $time);
                $updated_at = $created_at;

                $status = DB::table('import_books')->insert(compact('book_id', 'amount', 'price', 'supplier_id', 'user_id','created_at', 'updated_at'));
                if($status == 1){
                    $store = Store::where('book_id', $book_id)->first();
                    $store->update(['amount' => $store->amount + $amount, 'total_amount' => $store->total_amount + $amount]);
                }
            }
        }
    }

}
