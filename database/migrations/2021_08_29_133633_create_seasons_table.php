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
            $table->foreignId('farmer_id');
            $table->foreignId('region_id');
            $table->string('phase');
            $table->foreignId('locality_id');
            $table->integer('nolot');
            $table->float('luaslot', 9, 2);
            $table->float('luasusaha', 9, 2);
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
