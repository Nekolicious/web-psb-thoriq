<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirAktif extends Model
{
    use HasFactory;

    protected $table = 'formuliraktif';
    protected $primarykey = 'id';

    protected $fillable = ['kcs_id','ppsb_id'];

    public function kcs() {
        return $this->hasOne(KelompokCalonSiswa::class, 'kcs_id', 'kcs_id');
    }

    public function ppsb() {
        return $this->hasOne(ProsesPSB::class, 'ppsb_id', 'ppsb_id');
    }
}
