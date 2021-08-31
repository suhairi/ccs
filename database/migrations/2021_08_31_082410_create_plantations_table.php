<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantations', function (Blueprint $table) {
            $table->id();
            $table->integer('pesawah_id');
            $table->integer('season_id');
            $table->string('varieti');
            $table->string('kaedah');
            $table->date('tarikhTanam');
            $table->date('tarikhJangkaTuai');
            $table->date('tarikhTuaiSebenar');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantations');
    }
}
