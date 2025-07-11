<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    protected $kategori=[
        [
            'kodeKategori' =>'AIO',
            'namaKategori' =>'All In One',
            'duaPilihan_id' => 1,
        ],
        [
            'kodeKategori' =>'PCR',
            'namaKategori' =>'PC rakitan',
            'duaPilihan_id' => 1,
        ],
        [
            'kodeKategori' =>'NB',
            'namaKategori' =>'Notebook',
            'duaPilihan_id' => 1,
        ],
        [
            'kodeKategori' =>'PRN',
            'namaKategori' =>'Printer',
            'duaPilihan_id' => 1,
        ],
    ];

    public function run(): void
    {
        Kategori::insert($this->kategori);
    }
}
