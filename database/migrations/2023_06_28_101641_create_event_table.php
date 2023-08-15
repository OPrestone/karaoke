<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location'); 
            $table->string('venue'); 
            $table->string('host');
            $table->mediumText('description')->nullable();
            $table->string('image')->default('user.png');
            $table->date('date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->longText('artists');
            $table->string('main_artist');
            $table->string('prize');
            $table->string('sponsor');
            $table->string('created_by');
            $table->tinyInteger('external')->default('1');
            $table->tinyInteger('group')->default('0');
            $table->tinyInteger('pre_reg')->default('1');
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
        Schema::dropIfExists('events');
    }
}
