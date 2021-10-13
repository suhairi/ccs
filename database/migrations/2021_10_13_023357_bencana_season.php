<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BencanaSeason extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bencana_season', function (Blueprint $table) {
            
            $table->bigInteger('bencana_id')->unsigned();
            $table->foreign('bencana_id')
                ->references('id')
                ->on('bencanas')
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
        Schema::dropIfExists('bencana_season');
    }
}
