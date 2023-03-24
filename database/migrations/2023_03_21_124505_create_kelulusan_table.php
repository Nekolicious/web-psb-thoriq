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
        Schema::create('kelulusan', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('calon_id')->nullable();
            // $table->unsignedBigInteger('ppsb_id')->nullable();
            // $table->unsignedBigInteger('kcs_id')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();

            $table->foreign('calon_id')->references('calon_id')->on('calonsiswa');
            // $table->foreign('kcs_id')->references('kcs_id')->on('kcs');
            // $table->foreign('ppsb_id')->references('ppsb_id')->on('ppsb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelulusan');
    }
};
