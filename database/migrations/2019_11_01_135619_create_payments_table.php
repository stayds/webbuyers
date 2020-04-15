<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('paymentrefno', 50);

            $table->bigInteger('userid')->unsigned();
            $table->foreign('userid')
                ->references('userid')
                ->on('users');

            $table->bigInteger('orderid')->unsigned();
            $table->foreign('orderid')
                ->references('orderid')
                ->on('orders');

            $table->bigInteger('paymentstatusid')->unsigned();
            $table->foreign('paymentstatusid')
                ->references('paymentstatusid')
                ->on('paymentstatuses');

            $table->double('amount');
            $table->string('message', 150);

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
        Schema::dropIfExists('payments');
    }
}
