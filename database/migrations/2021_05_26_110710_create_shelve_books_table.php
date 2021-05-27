<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShelveBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelve_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shelve_id');
            $table->string('row');
            $table->unsignedBigInteger('book_id');
            $table->foreign('shelve_id')->references('id')->on('shelves')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shelve_books');
    }
}
