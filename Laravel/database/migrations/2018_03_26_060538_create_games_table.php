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
            $table->string('title');
            $table->primary('title');

            $table->text('description');
            $table->date('realease');

            $table->string('link');
            $table->string('image');
            $table->integer('upload_by')->unsigned();  
                      
            $table->integer('price')->default(0);
            $table->integer('sales')->default(0);
            $table->integer('upvote')->default(0);
            $table->integer('downvote')->default(0);
            
            $table->timestamps();

           
        });

        Schema::table('games',function(Blueprint $table){
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
        Schema::dropIfExists('games');
    }
}
