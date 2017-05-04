<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBillDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned();;
            $table->integer('bill_id')->unsigned();;
            $table->integer('amount')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('book_id')->references('book_id')->on('stores')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('bill_id')->references('id')->on('bills')->onUpdate('cascade')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bill_details');
    }
}
