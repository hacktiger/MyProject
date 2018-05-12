<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('game_title');
            $table->integer('user_id')->unsigned();  
            $table->unsignedDecimal('price',6,2)->default(0);          
            $table->timestamps();         
        });

        Schema::table('sales_log',function(Blueprint $table){
            $table->foreign('game_title')->references('title')->on('games')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropForeign(['title','user_id']);
        Schema::dropIfExists('sales_log');
    }
}
