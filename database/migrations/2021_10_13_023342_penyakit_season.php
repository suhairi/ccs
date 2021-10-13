<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenyakitSeason extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyakit_season', function (Blueprint $table) {
            
            $table->bigInteger('penyakit_id')->unsigned();
            $table->foreign('penyakit_id')
                ->references('id')
                ->on('penyakits')
                ->onDelete('cascade');

            $table->bigInteger('season_id')->unsigned();
            $table->foreign('season_id')
                ->references('id')
                ->on('seasons')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyakit_season');
    }
}
