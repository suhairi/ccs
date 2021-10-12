<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerosakPest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perosak_pest', function (Blueprint $table) {
            $table->foreignId('perosak_id')->unsigned();
            $table->foreignId('pest_id')->unsigned();
            $table->foreign('perosak_id')
                ->references('id')
                ->on('perosaks')
                ->onDelete('cascade');
            $table->foreign('pest_id')
                ->references('id')
                ->on('pests')
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
        //
    }
}
