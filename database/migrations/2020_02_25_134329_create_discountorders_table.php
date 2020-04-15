<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discountorders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('discountid');
            $table->foreign('discountid')->references('id')->on('discounts');

            $table->unsignedBigInteger('orderid');
            $table->foreign('orderid')->references('orderid')->on('orders');

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
        Schema::dropIfExists('discountorders');
    }
}
