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
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id_book');
            
            $table->string('title');
            $table->integer('year');
            $table->integer('isbn');
            $table->integer('page');
            $table->text('synopsis');
            $table->string('picture');
            $table->integer('prize');
            $table->integer('discon');
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
