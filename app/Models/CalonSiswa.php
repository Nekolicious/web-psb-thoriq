<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    use HasFactory;
    
    protected $table = 'calonsiswa';
    protected $primarykey = 'calon_id';

    protected $fillable = ['kcs_id','foto_id','nodaftar','nama','jeniskelamin','tempatlahir','tgllahir','agama','kewarganegaraan','alamat','namaortu','pendidikanortu','pekerjaanortu','teleponortu','alamatortu','status'];

    protected $attributes = [
        'status' => '1',
    ];

    public function kcs() {
        return $this->hasOne(KelompokCalonSiswa::class, 'kcs_id', 'kcs_id');
    }

    public function foto() {
        return $this->hasOne(FotoSiswa::class, 'foto_id', 'foto_id');
    }

    public function paud() {
        return $this->hasOne(CalonSiswaPAUD::class, 'calon_id', 'calon_id');
    }

    public function tpa() {
        return $this->hasOne(CalonSiswaTPA::class, 'calon_id', 'calon_id');
    }
}
