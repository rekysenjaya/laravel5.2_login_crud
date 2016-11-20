<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
    protected $fillable = ['id', 'nama', 'alamat', 'no_telepon', 'rt', 'rw', 'id_kelurahan', 'tanggal_lahir', 'jenis_kelamin'];
}
