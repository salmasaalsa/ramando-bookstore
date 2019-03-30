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
        Schema::create('review', function (Blueprint $table) {
            $table->increments('id_review');
            $table->foreign('id_buyer')->references("id_buyer")->on('buyer')->onDelete('cascade');
            $table->foreign('id_book')->references("id_book")->on('book')->onDelete('cascade');
            $table->text('review');
            $table->integer('rating');
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
