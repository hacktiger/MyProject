<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::enableForeignKeyConstraints();
        Schema::create('game_tag', function (Blueprint $table) {
            $table->string('title');
            $table->foreign('title')->references('title')->on('games');

            $table->boolean('FPS')->default(0);
            $table->boolean('Adventure')->default(0);
            $table->boolean('RPG')->default(0);
            $table->boolean('Action')->default(0);
            $table->boolean('Puzzle')->default(0);
            $table->boolean('Strategy')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_tag');
    }
}
