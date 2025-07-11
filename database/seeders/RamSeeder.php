<?php

namespace Database\Seeders;

use App\Models\Ram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RamSeeder extends Seeder
{

    protected $ram=[
        [
            'barang_id'=>1,
            'tipeRam_id'=>4,
            'kapasitas'=>8,
            'keterangan'=>'asli dari baru',
            'satuanSize_id'=>3,
        ],
    ];

    public function run(): void
    {
         Ram::insert($this->ram);
    }
}
