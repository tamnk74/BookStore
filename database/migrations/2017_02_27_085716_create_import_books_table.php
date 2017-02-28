<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImportBooksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned();
            $table->integer('amount')->unsigned();
            $table->date('date');
            $table->integer('buy_price')->unsigned();
            $table->integer('sell_price')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('book_id')->references('book_id')->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('import_books');
    }
}
