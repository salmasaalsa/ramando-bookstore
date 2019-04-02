<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function(Blueprint $table){
            $table->increments('id_payment');
            $table->integer('id_order')->unsigned();
            $table->timestamp('date_payment');
            $table->boolean('status_payment');

            $table->foreign('id_order')->references('id_order')->on('order');
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
