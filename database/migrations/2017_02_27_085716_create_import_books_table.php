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
            $table->integer('user_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->integer('amount')->unsigned();
            $table->integer('price')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('book_id')->references('id')->on('books')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('cascade')->onDelete('cascade');;
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
