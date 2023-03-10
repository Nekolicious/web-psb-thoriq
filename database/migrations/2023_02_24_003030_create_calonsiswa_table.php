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
        Schema::create('calonsiswa', function (Blueprint $table) {
            $table->id('calon_id');
            $table->unsignedBigInteger('kcs_id');
            $table->unsignedBigInteger('foto_id')->nullable();
            $table->string('nodaftar')->nullable();
            $table->string('nama');
            $table->string('jeniskelamin');
            $table->string('tempatlahir');
            $table->date('tgllahir');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->string('alamat');
            $table->string('namaortu');
            $table->string('pendidikanortu');
            $table->string('pekerjaanortu');
            $table->string('teleponortu');
            $table->string('alamatortu');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('kcs_id')->references('kcs_id')->on('kcs');
            $table->foreign('foto_id')->references('foto_id')->on('fotosiswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calonsiswa');
    }
};
