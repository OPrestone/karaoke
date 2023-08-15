<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLyricsTable extends Migration
{
    public function up()
    {
        Schema::create('lyrics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('start_time_ms');
            $table->string('words');
            $table->string('track_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lyrics');
    }
}
