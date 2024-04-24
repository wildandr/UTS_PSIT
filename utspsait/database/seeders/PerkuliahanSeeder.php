<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerkuliahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perkuliahan')->insert([
            [
                'nim' => 'SV_001',
                'kode_mk' => 'SVPL_001',
                'nilai' => 90,
            ],
            [
                'nim' => 'SV_001',
                'kode_mk' => 'SVPL_002',
                'nilai' => 87,
            ],
            [
                'nim' => 'SV_001',
                'kode_mk' => 'SVPL_003',
                'nilai' => 88,
            ],
            [
                'nim' => 'SV_002',
                'kode_mk' => 'SVPL_001',
                'nilai' => 98,
            ],
            [
                'nim' => 'SV_002',
                'kode_mk' => 'SVPL_002',
                'nilai' => 77,
            ],
        ]);
    }
}
