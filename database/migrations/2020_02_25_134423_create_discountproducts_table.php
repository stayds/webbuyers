<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discountproducts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('discountid');
            $table->foreign('discountid')->references('id')->on('discounts');

            $table->unsignedBigInteger('productid');
            $table->foreign('productid')->references('productid')->on('products');

            $table->integer('use');
            $table->integer('used');

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
        Schema::dropIfExists('discountproducts');
    }
}
