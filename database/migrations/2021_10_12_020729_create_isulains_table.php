<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsulainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isulains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('season_id');
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('isulains');
    }
}
