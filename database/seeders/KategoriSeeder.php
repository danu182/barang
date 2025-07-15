<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    protected $kategori=[
        [	 'kodeKategori' 	=>	'SRV',	 'namaKategori' 	=>	'SERVER', 'duaPilihan_id'=>1],
        [	 'kodeKategori' 	=>	'MAC',	 'namaKategori' 	=>	'IMAC', 'duaPilihan_id'=>1],
        [	 'kodeKategori' 	=>	'LP',	 'namaKategori' 	=>	'LAPTOP', 'duaPilihan_id'=>1],
        [	 'kodeKategori' 	=>	'MCK',	 'namaKategori' 	=>	'MACKBOOK', 'duaPilihan_id'=>1],
        [	 'kodeKategori' 	=>	'PNR',	 'namaKategori' 	=>	'PRINTER', 'duaPilihan_id'=>1],
        [	 'kodeKategori' 	=>	'SCR',	 'namaKategori' 	=>	'SCANER', 'duaPilihan_id'=>1],

    ];

    public function run(): void
    {
        Kategori::insert($this->kategori);
    }
}
