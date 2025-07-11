<?php

namespace Database\Seeders;

use App\Models\TipeHardDisk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeHardiskSeeder extends Seeder
{

    protected $tipeHardisk=[
        ['namaTipeHardDisk'=>'HD Sata'],
        ['namaTipeHardDisk'=>'SSD Sata'],
        ['namaTipeHardDisk'=>'NVME'],
    ];


    public function run(): void
    {
        TipeHardDisk::insert($this->tipeHardisk);
    }
}
