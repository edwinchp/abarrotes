<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('content', 8, 2); //Total and decimal digits
            $table->string('measure')->nullable();
            $table->double('price', 8, 4)->nullable();
            $table->double('offer_price', 8, 4)->nullable();
            $table->boolean('isOffer')->nullable();
            $table->string('description', 500)->nullable(); //500 lenght
            $table->string('category')->nullable();
            $table->string('picture')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('products');
    }
}
