<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['nim', 'nama', 'alamat', 'tanggal_lahir'];

    // Definisikan relasi dengan tabel Perkuliahan
    public function perkuliahan()
    {
        return $this->hasMany(Perkuliahan::class, 'nim', 'nim');
    }
}
