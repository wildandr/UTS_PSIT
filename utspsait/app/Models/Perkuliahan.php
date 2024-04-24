<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perkuliahan extends Model
{
    protected $table = 'perkuliahan';
    protected $primaryKey = 'id_perkuliahan';
    public $timestamps = false;

    protected $fillable = ['nim', 'kode_mk', 'nilai'];

    // Definisikan relasi dengan tabel Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    // Definisikan relasi dengan tabel Matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_mk', 'kode_mk');
    }
}
