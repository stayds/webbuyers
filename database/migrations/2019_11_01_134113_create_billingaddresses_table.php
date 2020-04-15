<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingaddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billingaddresses', function (Blueprint $table) {
            $table->bigIncrements('billaddressid');

            $table->bigInteger('userid')->unsigned();
            $table->foreign('userid')
                  ->references('userid')
                  ->on('users');

            $table->string('firstname',20)->nullable();
            $table->string('lastname',20)->nullable();

            $table->bigInteger('stateid')->unsigned();
            $table->foreign('stateid')
                  ->references('stateid')
                  ->on('states');

            $table->text('address');

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
        Schema::dropIfExists('billingaddresses');
    }
}
