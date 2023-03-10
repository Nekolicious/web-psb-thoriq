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
        Schema::create('formuliraktif', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ppsb_id')->nullable();
            $table->unsignedBigInteger('kcs_id')->nullable();
            $table->timestamps();

            $table->foreign('ppsb_id')->references('ppsb_id')->on('ppsb');
            $table->foreign('kcs_id')->references('kcs_id')->on('kcs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formuliraktif');
    }
};
