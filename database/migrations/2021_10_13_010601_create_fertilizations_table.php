<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fertilizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('season_id');
            $table->foreignId('fertilizer_id');
            $table->string('kekerapan');
            $table->date('tarikh');
            $table->date('hlt');
            $table->float('kgPerRelung');
            $table->float('kgPerHektar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fertilizations');
    }
}
