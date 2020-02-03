<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table="peminjaman";
    protected $fillable=[
        'id_anggota','id_petugas','tgl','deadline','denda'
    ];
}
