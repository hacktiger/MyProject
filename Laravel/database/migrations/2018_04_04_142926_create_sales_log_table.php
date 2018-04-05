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
            // Error since upload_by is not primary key
            //$table->string('upload_by');
            // $table->foreign('upload_by')->references('upload_by')->on('games');
            $table->string('title');
            $table->foreign('title')->references('title')->on('games');


            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('sales_log');
    }
}
