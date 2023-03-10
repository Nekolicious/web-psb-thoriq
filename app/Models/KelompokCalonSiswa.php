<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokCalonSiswa extends Model
{
    use HasFactory;

    protected $table = 'kcs';
    protected $primarykey = 'kcs_id';

    protected $fillable = ['nama','kapasitas','keterangan','ppsb_id'];

    public function ppsb() {
        return $this->hasOne(ProsesPSB::class, 'ppsb_id', 'ppsb_id');
    }

    public function calon() {
        return $this->hasMany(CalonSiswa::class, 'kcs_id', 'kcs_id');
    }
}
