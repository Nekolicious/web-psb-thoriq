<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesPSB extends Model
{
    use HasFactory;

    protected $table = 'ppsb';
    protected $primarykey = 'ppsb_id';

    protected $fillable = ['nama','kode','keterangan','status'];

    protected $attributes = [
        'status' => '1',
    ];

    public function kcs() {
        return $this->hasMany(KelompokCalonSiswa::class, 'ppsb_id', 'ppsb_id');
    }
}
