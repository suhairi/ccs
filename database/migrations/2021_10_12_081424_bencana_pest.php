<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BencanaPest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bencana_pest', function (Blueprint $table) {
            $table->foreignId('bencana_id')->unsigned();
            $table->foreignId('pest_id')->unsigned();
            $table->foreign('bencana_id')
                ->references('id')
                ->on('bencanas')
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
