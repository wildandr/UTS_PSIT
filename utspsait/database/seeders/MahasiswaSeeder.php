<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa')->insert([
            [
                'nim' => 'SV_001',
                'nama' => 'Joko',
                'alamat' => 'Bantul',
                'tanggal_lahir' => '1999-12-07',
            ],
            [
                'nim' => 'SV_002',
                'nama' => 'Paul',
                'alamat' => 'Sleman',
                'tanggal_lahir' => '2000-10-07',
            ],
            [
                'nim' => 'SV_003',
                'nama' => 'Andy',
                'alamat' => 'Surabaya',
                'tanggal_lahir' => '2000-02-09',
            ],
        ]);
    }
}
