<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->string('musim');
            $table->integer('pesawah_id');
            $table->integer('region_id');
            $table->string('fasa');
            $table->integer('locality_id');
            $table->integer('nolot');
            $table->float('luaslot', 8, 2);
            $table->float('luasusaha', 8, 2);
            $table->string('koordinat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
    }
}
