<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimilarArtistsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('similar_artists', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('artist_id');
            $table->unsignedInteger('similar_artist_id');
            $table->timestamps();

            $table->foreign('artist_id')
                    ->references('id')->on('artists')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('similar_artists');
    }

}
