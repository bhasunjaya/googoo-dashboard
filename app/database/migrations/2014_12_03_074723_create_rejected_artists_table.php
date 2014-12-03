<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRejectedArtistsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('rejected_artists', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('artist_id');
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
        Schema::drop('newsongs');
    }

}
