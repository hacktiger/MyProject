<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdminStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('admin_status', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned();
            $table->integer('game_manage')->unsigned();
            $table->integer('sales_log')->unsigned();
            $table->integer('wallet_history')->unsigned();
            $table->integer('game_report')->unsigned();
            $table->integer('tag_manage')->unsigned();
            $table->integer('profile_manage')->unsigned();
        });

        //
        Schema::table('admin_status', function(Blueprint $table){
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('admin_status');
    }
}
