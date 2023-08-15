<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReleaseDateToSongs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
        public function up()
        {
            Schema::table('songs', function (Blueprint $table) {
                $table->date('release_date')->nullable();
            });
        } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('songs', function (Blueprint $table) {
            //
        });
    }
}
