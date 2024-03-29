<?php

namespace Database\Seeders;

use App\Models\KelompokCalonSiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KCSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kcs = [
            [
                'nama' => 'Gelombang Tes 1',
                'kapasitas' => '100',
                'keterangan' => 'Data Test',
                'ppsb_id' => '1',
            ],
            [
                'nama' => 'Gelombang Tes 2',
                'kapasitas' => '120',
                'keterangan' => 'Data Test 2',
                'ppsb_id' => '2',
            ],
        ];

        foreach ($kcs as $key => $value) {
            KelompokCalonSiswa::create($value);
        }
    }
}
