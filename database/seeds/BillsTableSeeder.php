<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use App\Models\Store;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = 60*60*24;
        // Convert to timetamps
        $client_name = 'Khach mua le';
        $client_address = 'Khach mua le';
        $users_id = User::get()->pluck('users_id');
        for($time = strtotime("2016-09-01"); $time < time(); $time+=$date){
            $books_id = Store::where('amount', '>', 0)->get()->pluck('book_id');
            if(count($books_id) ==0) break;
            $updated_at = $created_at = date('Y-m-d H:i:s', $time);
            for($i=0; $i< rand(1,40); $i++){
                $total_price =0;
                $book_ids = array_values($books_id->random(rand(1,5))->all());
                $amounts =[];
                for($j=0; $j<count($book_ids); $j++){
                    $book = Book::find($book_ids[$j]);
                    $bookStore = Store::where('book_id', $book->id)->first();
                    $amounts[$j] = rand(1,max(5, $bookStore->amount));
                    $total_price += ($book->price*(100-$book->sale)/100)*$amounts[$j];
                }
                $user_id = 2;

                $bill_id = DB::table('bills')->insertGetId(compact('user_id', 'client_name', 'client_address', 'total_price','created_at', 'updated_at'));
                for($k=0; $k<count($book_ids); $k++){
                    $billDetail = DB::table('bill_details')->insert([
                        'book_id' => $book_ids[$k],
                        'amount' => $amounts[$k],
                        'bill_id' => $bill_id,
                        'created_at' => $created_at,
                        'updated_at' => $updated_at
                    ]);
                }

            }
        }
    }
}
