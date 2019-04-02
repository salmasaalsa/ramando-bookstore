<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function(Blueprint $table){
            $table->increments('id_order');
            $table->integer('id_wishlist')->unsigned();
            $table->integer('id_buyer')->unsigned();
            $table->timestamp('date_order');
            $table->boolean('status_order');

            $table->foreign('id_wishlist')->references('id_wishlist')->on('wishlist');
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
