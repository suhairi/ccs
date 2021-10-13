<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IsulainSeason extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isulain_season', function (Blueprint $table) {
            
            $table->bigInteger('isulain_id')->unsigned();
            $table->foreign('isulain_id')
                ->references('id')
                ->on('isulains')
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
        Schema::dropIfExists('isulain_season');
    }
}
