<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArtistIdAndGenreIdToArtistGenreTable extends Migration
{
    public function up()
    {
        Schema::table('artist_genre', function (Blueprint $table) {
            $table->unsignedBigInteger('artist_id');
            $table->unsignedBigInteger('genre_id');
        });
    }

    public function down()
    {
        Schema::table('artist_genre', function (Blueprint $table) {
            $table->dropColumn(['artist_id', 'genre_id']);
        });
    }
}
