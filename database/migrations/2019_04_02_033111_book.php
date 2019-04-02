<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function(Blueprint $table){
            $table->increments('id_book');
            $table->integer('id_category')->unsigned();
            $table->integer('id_author')->unsigned();
            $table->integer('id_publisher')->unsigned();
            $table->string('title');
            $table->integer('year');
            $table->integer('isbn');
            $table->integer('page');
            $table->text('synopsis');
            $table->string('image');
            $table->integer('price');
            $table->integer('discount');

            $table->foreign('id_category')->references('id_category')->on('category');
            $table->foreign('id_author')->references('id_author')->on('author');
            $table->foreign('id_publisher')->references('id_publisher')->on('publisher');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
