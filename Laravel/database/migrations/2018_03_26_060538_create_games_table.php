<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('games', function (Blueprint $table) {
            $table->string('title'); $table->primary('title');
            $table->text('description');
            $table->string('link');
            $table->string('image');
            $table->string('upload_by');
            $table->integer('price');
            $table->interger('sales');
            $table->integer('upvote')->default(0);
            $table->integer('downvote')->default(0);
            $table->boolean('FPS')->default(0);
            $table->boolean('Adventure')->default(0);
            $table->boolean('RPG')->default(0);
            $table->boolean('Action')->default(0);
            $table->boolean('Puzzle')->default(0);
            $table->boolean('Strategy')->default(0);
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
        Schema::dropIfExists('games');
    }
}
