<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping', function(Blueprint $table){
            $table->increments('id_shipping');
            $table->integer('id_order')->unsigned();
            $table->integer('id_courrier')->unsigned();
            $table->timestamp('date_shipping');
            $table->text('description');
            $table->boolean('status');
            $table->date('date_arrived');

            $table->foreign('id_order')->references('id_order')->on('order');
            $table->foreign('id_courrier')->references('id_courrier')->on('shipping_courrier');
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
