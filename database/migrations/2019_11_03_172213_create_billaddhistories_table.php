<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilladdhistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billaddhistories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('billaddressid')->unsigned();
            $table->foreign('billaddressid')
                  ->references('billaddressid')
                  ->on('billingaddresses');

            $table->bigInteger('stateid')->unsigned();
            $table->foreign('stateid')
                ->references('stateid')
                ->on('states');

            $table->text('oldaddress');

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
        Schema::dropIfExists('billaddhistories');
    }
}
