<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('upload_by')->unsigned();
            $table->string('game_title')->unique();       
            $table->text('text');
        });

        Schema::table('report', function(Blueprint $table){
            $table->foreign('game_title')->references('title')->on('games')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('upload_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report');
    }
}
