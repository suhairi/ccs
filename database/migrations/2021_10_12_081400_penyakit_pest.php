<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenyakitPest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyakit_pest', function (Blueprint $table) {
            $table->foreignId('penyakit_id')->unsigned();
            $table->foreignId('pest_id')->unsigned();
            $table->foreign('penyakit_id')
                ->references('id')
                ->on('penyakits')
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
