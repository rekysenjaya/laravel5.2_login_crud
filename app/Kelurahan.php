<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $fillable = ['id', 'nama_kel', 'nama_kec', 'nama_kota'];
}
