<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fertilizers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('season_id');
            $table->float('sebatian1');
            $table->float('sebatian2');
            $table->date('sebatian1Date');
            $table->date('sebatian2Date');
            $table->float('urea1');
            $table->float('urea2');
            $table->date('urea1Date');
            $table->date('urea2Date');
            $table->float('tambahan1');
            $table->float('tambahan2');
            $table->date('tambahan1Date');
            $table->date('tambahan2Date');
            $table->float('lain1');
            $table->float('lain2');
            $table->date('lain1Date');
            $table->date('lain2Date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fertilizers');
    }
}
