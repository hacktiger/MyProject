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
        Schema::enableForeignKeyConstraints();
        Schema::create('games', function (Blueprint $table) {
            $table->string('title');
            $table->primary('title');
            $table->text('description');
            $table->string('link');
            $table->string('image');
            $table->string('upload_by');
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
