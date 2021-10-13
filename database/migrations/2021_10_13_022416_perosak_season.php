<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerosakSeason extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perosak_season', function (Blueprint $table) {

            $table->bigInteger('perosak_id')->unsigned();
            $table->foreign('perosak_id')
                ->references('id')
                ->on('perosaks')
                ->onDelete('cascade');

            $table->bigInteger('season_id')->unsigned();
            $table->foreign('season_id')
                ->references('id')
                ->on('seasons')
                ->onDelete('cascade');

            $table->float('peratusKerosakan', 4, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perosak_season');
    }
}
