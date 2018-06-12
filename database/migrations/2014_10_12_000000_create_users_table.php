<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('fName',20);
            $table->string('lName',32);
            $table->string('userName',25);
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('admin',3)->default('no');
            $table->string('master',3)->default('no');
            $table->integer('isBanned')->default(0)->length(1);
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
