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
            $table->string('slug')->nullable();
            $table->float('avg_rating',3,2)->default(0);
            $table->text('description');
            $table->smallInteger('release')->unsigned();
            $table->string('link');
            $table->string('image')->default('khongCoImage_game.jpg');
            $table->string('upload_by');
            $table->unsignedDecimal('price',6,2)->default(0);
            $table->unsignedDecimal('sales',6,2)->default(0);
            $table->timestamps();   
            $table->enum('approved',['N', 'Y'])->default('N');   
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
