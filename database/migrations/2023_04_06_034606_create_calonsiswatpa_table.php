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
        Schema::create('calonsiswatpa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calon_id');
            $table->foreign('calon_id')->references('calon_id')->on('calonsiswa');

            $table->text('nism');
            $table->text('nisn');
            $table->text('nik');
            $table->text('hobi');
            $table->text('citacita');
            $table->text('anakke');
            $table->text('jmlsaudara');

            $table->text('namaayah');
            $table->text('nikayah');
            $table->text('tempatlahirayah');
            $table->text('tgllahirayah');
            $table->text('pendidikanayah');
            $table->text('pekerjaanayah');
            $table->text('teleponayah');
            $table->text('alamatayah');
            $table->text('penghasilanayah');

            $table->text('namaibu');
            $table->text('nikibu');
            $table->text('tempatlahiribu');
            $table->text('tgllahiribu');
            $table->text('pendidikanibu');
            $table->text('pekerjaanibu');
            $table->text('teleponibu');
            $table->text('alamatibu');
            $table->text('penghasilanibu');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calonsiswatpa');
    }
};
