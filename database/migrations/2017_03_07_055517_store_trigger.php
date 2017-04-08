<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Trigger for update book into store when inserting book
        DB::unprepared('
        CREATE TRIGGER books_stores_trigger 
        AFTER INSERT 
        ON books 
        FOR EACH ROW 
        INSERT INTO stores (`book_id`, `amount`, `total_amount`) VALUES (NEW.id, 0, 0)
        ');
        DB::unprepared('
        CREATE TRIGGER delete_books_stores_trigger 
        AFTER DELETE ON books 
        FOR EACH ROW 
        DELETE FROM stores WHERE stores.book_id = OLD.id
        ');
        //Trigger for update book into store when importing book
        DB::unprepared('
        CREATE TRIGGER import_store_trigger 
        AFTER INSERT 
        ON import_books 
        FOR EACH ROW 
        UPDATE stores SET stores.amount = stores.amount + NEW.amount, stores.total_amount = stores.total_amount + NEW.amount WHERE stores.book_id = NEW.book_id
        ');
        DB::unprepared('
        CREATE TRIGGER update_import_store_trigger 
        AFTER UPDATE ON import_books 
        FOR EACH ROW 
        UPDATE stores SET stores.amount = stores.amount + NEW.amount - OLD.amount, stores.total_amount = stores.total_amount + NEW.amount - OLD.amount 
        WHERE stores.book_id = NEW.book_id
        ');
        //Trigger for update book into store when making bills
        DB::unprepared('
        CREATE TRIGGER add_bills_trigger 
        AFTER INSERT 
        ON bill_details 
        FOR EACH ROW 
        UPDATE stores SET stores.amount = stores.amount - NEW.amount, stores.total_amount = stores.total_amount WHERE stores.book_id = NEW.book_id      
        ');
        DB::unprepared('
        CREATE TRIGGER update_bills_trigger 
        AFTER UPDATE ON bill_details 
        FOR EACH ROW 
        UPDATE stores SET stores.amount = stores.amount + NEW.amount - OLD.amount, stores.total_amount = stores.total_amount 
        WHERE stores.book_id = NEW.book_id
        ');
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('
        DROP TRIGGER update_import_store_trigger;
        ');
        DB::unprepared('
        DROP TRIGGER import_store_trigger;
        ');
        DB::unprepared('
        DROP TRIGGER delete_books_stores_trigger;
        ');
        DB::unprepared('
        DROP TRIGGER books_stores_trigger;
        ');
        
    }
}
