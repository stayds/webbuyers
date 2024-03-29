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
            $table->bigIncrements('productid');

            $table->bigInteger('prodcatid')->unsigned();
            $table->foreign('prodcatid')
                ->references('prodcatid')
                ->on('productcategories');

            $table->string("productname", 50);
            $table->text('description');
            $table->float('price');
            $table->float('discount')->default(0.00);
            $table->boolean('status')->default(1);
            $table->string('productimg',100);
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
