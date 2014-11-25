<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsongsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('newsongs', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('song_id');
            $table->timestamps();

            $table->foreign('song_id')
                    ->references('id')->on('songs')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('newsongs');
    }

}
