<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    protected $kategori=[
        [
            'kodeKategori' =>'LP',
            'namaKategori' =>'Laptop / Notebook',
            'duaPilihan_id' => 1,
        ],
        [
            'kodeKategori' =>'PRN',
            'namaKategori' =>'Printer',
            'duaPilihan_id' => 1,
        ],
        [
            'kodeKategori' =>'MB',
            'namaKategori' =>'MacBook',
            'duaPilihan_id' => 1,
        ],
        [
            'kodeKategori' =>'MAC',
            'namaKategori' =>'IMac',
            'duaPilihan_id' => 1,
        ],
        [
            'kodeKategori' =>'PC',
            'namaKategori' =>'Personal Computer',
            'duaPilihan_id' => 1,
        ],
    ];

    public function run(): void
    {
        Kategori::insert($this->kategori);
    }
}
