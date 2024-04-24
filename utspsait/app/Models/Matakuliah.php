<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliah';
    protected $primaryKey = 'kode_mk';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['kode_mk', 'nama_mk', 'sks'];

    // Definisikan relasi dengan tabel Perkuliahan
    public function perkuliahan()
    {
        return $this->hasMany(Perkuliahan::class, 'kode_mk', 'kode_mk');
    }
}
