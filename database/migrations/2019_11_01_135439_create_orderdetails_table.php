<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->bigIncrements('orderdetailid');

            $table->bigInteger('orderid')->unsigned();
            $table->foreign('orderid')
                  ->references('orderid')
                  ->on('orders');

            $table->bigInteger('productid')->unsigned();
            $table->foreign('productid')
                  ->references('productid')
                  ->on('products');

            $table->float('quantity');
            $table->float('unitprice');
            $table->double('totalprice');
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
        Schema::dropIfExists('orderdetails');
    }
}
