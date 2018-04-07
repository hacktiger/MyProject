<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_tags', function (Blueprint $table) {
            $table->increments('id');

            $table->string('games_title');

            $table->integer('tags_id')->unsigned();

        });

        Schema::table('games_tags', function(Blueprint $table){
            $table->foreign('games_title')->references('title')->on('games')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    
        Schema::dropIfExists('games_tags');
    }
}
