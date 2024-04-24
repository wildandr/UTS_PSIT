<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matakuliah')->insert([
            [
                'kode_mk' => 'SVPL_001',
                'nama_mk' => 'Database',
                'sks' => 2,
            ],
            [
                'kode_mk' => 'SVPL_002',
                'nama_mk' => 'Kecerdasan Artifisial',
                'sks' => 2,
            ],
            [
                'kode_mk' => 'SVPL_003',
                'nama_mk' => 'Interoperabilitas',
                'sks' => 2,
            ],
        ]);
    }
}
