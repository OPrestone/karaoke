<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRatingToVoters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('voters', function (Blueprint $table) {
            $table->unsignedBigInteger('votes')->default(0);
            $table->mediumText('comment')->default(0);
            $table->unsignedBigInteger('vote_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voters', function (Blueprint $table) {
            $table->dropColumn('votes');
            $table->dropColumn('comment');
            $table->dropColumn('vote_id');
        });
    }
}
