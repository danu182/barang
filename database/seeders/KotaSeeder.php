<?php

namespace Database\Seeders;

use App\Models\Kota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KotaSeeder extends Seeder
{

     protected $kota =  [
        ['profinsi_id'=>11, 'namaKota'=>'Jakarta Utara'],
        ['profinsi_id'=>11, 'namaKota'=>'Jakarta Barat'],
        ['profinsi_id'=>11, 'namaKota'=>'Jakarta Pusat'],
        ['profinsi_id'=>11, 'namaKota'=>'Jakarta Selatab'],
        ['profinsi_id'=>11, 'namaKota'=>'Jakarta Timur'],
    ];

    public function run(): void
    {
        Kota::insert($this->kota);
    }
}
