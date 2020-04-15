<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('orderid');

            $table->bigInteger('userid')->unsigned();
            $table->foreign('userid')
                ->references('userid')
                ->on('users');

            $table->bigInteger('orderstatid')->unsigned();
            $table->foreign('orderstatid')
                ->references('orderstatid')
                ->on('orderstatuses');

            $table->string('orderrefno', 20)->unique()->nullable();
            $table->double('totalcost');
            $table->integer('qty');
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
        Schema::dropIfExists('orders');
    }
}
