<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoSiswa extends Model
{
    use HasFactory;

    protected $table = 'fotosiswa';
    protected $primarykey = 'foto_id';

    protected $fillable = ['filename', 'path'];
}
