<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->longText('description');
            $table->string('yt_iframe')->nullable();
            $table->string('meta_title');
            $table->longText('meta_description')->nullable();
            $table->datetime('scheduled_at')->nullable();
            $table->longText('meta_keyword');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('breaking')->default('0');
            $table->integer('created_by');
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
        Schema::dropIfExists('posts');
    }
}
