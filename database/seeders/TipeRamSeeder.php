<?php

namespace Database\Seeders;

use App\Models\TipeRam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeRamSeeder extends Seeder
{

    protected $tipeRam=[
        ['tipeRam'=>'DDR1', 'keterangan'=>'DDR 1'],
        ['tipeRam'=>'DDR2', 'keterangan'=>'DDR 2'],
        ['tipeRam'=>'DDR3', 'keterangan'=>'DDR 3'],
        ['tipeRam'=>'DDR4', 'keterangan'=>'DDR 4'],
        ['tipeRam'=>'DDR5', 'keterangan'=>'DDR 5'],
    ];

    public function run(): void
    {
        TipeRam::insert($this->tipeRam);
    }
}
