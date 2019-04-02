<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Review extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function(Blueprint $table){
            $table->increments('id_review');
            $table->integer('id_book')->unsigned();
            $table->integer('id_buyer')->unsigned();
            $table->text('review');
            $table->integer('rating');

            $table->foreign('id_book')->references('id_book')->on('book');
            $table->foreign('id_buyer')->references('id_buyer')->on('buyer');
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
