<?php

namespace Database\Seeders;

use App\Models\ProsesPSB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PSBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ppsb = [
            [
                'nama' => 'Dummy Test 01',
                'kode' => 'DMT01',
                'keterangan' => 'Data Test',
                'status' => '1',
            ],
        ];

        foreach ($ppsb as $key => $value) {
            ProsesPSB::create($value);
        }
    }
}
