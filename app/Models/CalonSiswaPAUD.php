<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswaPAUD extends Model
{
    use HasFactory;

    protected $table = 'calonsiswapaud';
    protected $primarykey = 'id';

    protected $fillable = [
        'calon_id',

        'nomorinduk',
        'citacita',
        'hobi',
        'jmlsaudara',
        'jaraksekolah',
        'kendaraan',
        'beratbadan',
        'tinggibadan',
        'lingkarkepala',

        'namaayah',
        'nikayah',
        'tempatlahirayah',
        'tgllahirayah',
        'teleponayah',
        'pekerjaanayah',
        'pendidikanayah',
        'alamatayah',
        'penghasilanayah',

        'namaibu',
        'nikibu',
        'tempatlahiribu',
        'tgllahiribu',
        'teleponibu',
        'pekerjaanibu',
        'pendidikanibu',
        'alamatibu',
        'penghasilanibu',
    ];

    public function siswa() {
        return $this->hasOne(CalonSiswa::class, 'calon_id', 'calon_id');
    }

}
