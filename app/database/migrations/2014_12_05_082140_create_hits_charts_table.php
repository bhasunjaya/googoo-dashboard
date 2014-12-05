<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHitsChartsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('hits_charts', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('song_id');
            $table->integer('count');
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
        Schema::drop('hits_charts');
    }

}
