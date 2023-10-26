<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswaTPA extends Model
{
    use HasFactory;

    protected $table = 'calonsiswatpa';
    protected $primarykey = 'id';

    protected $fillable = [
        'calon_id',

        'nism',
        'nisn',
        'nik',
        'hobi',
        'citacita',
        'anakke',
        'jmlsaudara',

        'namaayah',
        'nikayah',
        'tempatlahirayah',
        'tgllahirayah',
        'pendidikanayah',
        'pekerjaanayah',
        'teleponayah',
        'alamatayah',
        'penghasilanayah',

        'namaibu',
        'nikibu',
        'tempatlahiribu',
        'tgllahiribu',
        'pendidikanibu',
        'pekerjaanibu',
        'teleponibu',
        'alamatibu',
        'penghasilanibu',
    ];

    public function siswa() {
        return $this->hasOne(CalonSiswa::class, 'calon_id', 'calon_id');
    }
}
