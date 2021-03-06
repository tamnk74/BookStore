<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('author_id')->unsigned();
            $table->integer('publisher_id')->unsigned();
            $table->integer('issuer_id')->unsigned()->nullable();
            $table->integer('language_id')->unsigned()->nullable();
            $table->integer('price')->unsigned();
            $table->integer('sale')->unsigned()->default(0);
            $table->text('description')->nullable();
            $table->string('size')->nullable();
            $table->float('weight')->nullable();
            $table->integer('page')->nullable();
            $table->string('front_cover', 255)->nullable();
            $table->string('back_cover', 255)->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('publishing_year')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('author_id')->references('id')->on('authors')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('issuer_id')->references('id')->on('issuers')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('publisher_id')->references('id')->on('publishers')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('language_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }
}
