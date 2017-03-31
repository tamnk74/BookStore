<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromotionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       /* Schema::create('promotions', function (Blueprint $table) {
            $table->integer('book_id')->unsigned()->unique();
            $table->integer('level');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('book_id')->references('id')->on('books');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       /*Schema::drop('promotions');*/
    }
}
