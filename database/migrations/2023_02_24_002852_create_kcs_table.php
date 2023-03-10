<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kcs', function (Blueprint $table) {
            $table->id('kcs_id');
            $table->unsignedBigInteger('ppsb_id');
            $table->string('nama');
            $table->integer('kapasitas');
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('ppsb_id')->references('ppsb_id')->on('ppsb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kcs');
    }
};
