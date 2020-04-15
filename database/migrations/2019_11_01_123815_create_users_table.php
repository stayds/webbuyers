<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('userid');

            $table->bigInteger('regmodeid')->unsigned();
            $table->foreign('regmodeid')
                ->references('regmodeid')
                ->on('registermodes');

            $table->string('name', 50);
            $table->string('email', 100)->unique();
            $table->string('password', 150);
            $table->string('phone', 20)->unique();
            $table->boolean('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
