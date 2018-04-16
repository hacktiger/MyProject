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
            $table->float('avg_rating',2,1)->default(0);
            $table->text('description');
            $table->integer('release');
            $table->string('link');
            $table->string('image');
            $table->string('upload_by');
            $table->integer('price')->default(0);
            $table->integer('sales')->default(0);
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
