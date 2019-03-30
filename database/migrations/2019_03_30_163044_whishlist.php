<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Whishlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whishlist', function (Blueprint $table) {
            $table->increments('id_whishlist');
            $table->foreign('id_book')->references("id_book")->on('book')->onDelete('cascade');
            $table->integer('number_of_item');
            $table->integer('total');
            $table->timestamp('created_at')->nullable();
            
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
