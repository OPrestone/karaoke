<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration {


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('artist');
            $table->string('album');
            $table->string('spotify_uri')->nullable();
            $table->string('preview_url')->nullable();
            $table->string('genre')->nullable();
            $table->integer('duration_ms')->nullable();
            $table->integer('popularity')->nullable();
            $table->date('release_date')->nullable();
            $table->string('label')->nullable();
            $table->string('image_url')->nullable();
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
        Schema::dropIfExists('songs');
    }
}
