<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->bigIncrements('userprofileid');

            $table->bigInteger('userid')->unsigned();
            $table->foreign('userid')
                ->references('userid')
                ->on('users');

            $table->bigInteger('stateid')->unsigned();
            $table->foreign('stateid')
                ->references('stateid')
                ->on('states');

            $table->string('fname', 50);
            $table->string('lname', 50);
            $table->date('dob')->nullable();
            $table->string('address', 150)->nullable();
            $table->string('profileimg', 100)->nullable();
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
        Schema::dropIfExists('userprofiles');
    }
}
