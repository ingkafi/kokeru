<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ruang';
    protected $nama_ruang = 'nama_ruang';
    protected $foto_ruang = 'foto_ruang';
    protected $status = 'status';
    protected $petugas = 'petugas';
    protected $foto_bukti = 'foto_bukti';
}
