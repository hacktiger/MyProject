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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->default('khongCoImage.jpg');
            $table->float('wallet',6,2)->unsigned()->default(0);
            $table->enum('auth_level',['ban','admin', 'developer', 'casual'])->default('casual');
            $table->rememberToken();
            $table->timestamps();
            $table->enum('status',['Read','Unread'])->default('Unread');
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
