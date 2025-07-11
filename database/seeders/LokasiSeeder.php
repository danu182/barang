<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
     protected $lokasi =  [
        ['kota_id'=>3, 'namaLokasi'=>'Tidak Ada','lantai'=>'0'],
        ['kota_id'=>3, 'namaLokasi'=>'GD BATAVIA','lantai'=>'10'],
        ['kota_id'=>3, 'namaLokasi'=>'GD BATAVIA','lantai'=>'11'],
        ['kota_id'=>4, 'namaLokasi'=>'BINTARO','lantai'=>'1'],
    ];

    public function run(): void
    {
        Lokasi::insert($this->lokasi);
    }
}
