<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempdetails', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('temporderid')->unsigned();
            $table->foreign('temporderid')
                  ->references('id')
                  ->on('temporders')
                  ->ondelete('cascade');

            $table->bigInteger('productid')->unsigned();

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
        Schema::dropIfExists('tempdetails');
    }
}
