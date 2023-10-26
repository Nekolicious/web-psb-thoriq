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
        Schema::create('calonsiswapaud', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calon_id');
            $table->foreign('calon_id')->references('calon_id')->on('calonsiswa');

            $table->text('nomorinduk');
            $table->text('citacita');
            $table->text('hobi');
            $table->text('jmlsaudara');
            $table->text('jaraksekolah');
            $table->text('kendaraan');
            $table->text('beratbadan');
            $table->text('tinggibadan');
            $table->text('lingkarkepala');

            $table->text('namaayah');
            $table->text('nikayah');
            $table->text('tempatlahirayah');
            $table->text('tgllahirayah');
            $table->text('teleponayah');
            $table->text('pendidikanayah');
            $table->text('pekerjaanayah');
            $table->text('penghasilanayah');
            $table->text('alamatayah');
            
            $table->text('namaibu');
            $table->text('nikibu');
            $table->text('tempatlahiribu');
            $table->text('tgllahiribu');
            $table->text('teleponibu');
            $table->text('pendidikanibu');
            $table->text('pekerjaanibu');
            $table->text('penghasilanibu');
            $table->text('alamatibu');

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
        Schema::dropIfExists('calonsiswapaud');
    }
};
