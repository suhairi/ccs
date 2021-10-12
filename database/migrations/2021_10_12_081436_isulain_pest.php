<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IsulainPest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isulain_pest', function (Blueprint $table) {
            $table->foreignId('isulain_id')->unsigned();
            $table->foreignId('pest_id')->unsigned();
            $table->foreign('isulain_id')
                ->references('id')
                ->on('isulains')
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
