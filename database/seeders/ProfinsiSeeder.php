<?php

namespace Database\Seeders;

use App\Models\Profinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


         protected $profinsi =  [
            ['negara_id'=> 1,'namaProfinsi' => 'ACEH'],
            ['negara_id'=> 1,'namaProfinsi' => 'SUMATERA UTARA'],
            ['negara_id'=> 1,'namaProfinsi' => 'SUMATERA BARAT'],
            ['negara_id'=> 1,'namaProfinsi' => 'RIAU'],
            ['negara_id'=> 1,'namaProfinsi' => 'JAMBI'],
            ['negara_id'=> 1,'namaProfinsi' => 'SUMATERA SELATAN'],
            ['negara_id'=> 1,'namaProfinsi' => 'BENGKULU'],
            ['negara_id'=> 1,'namaProfinsi' => 'LAMPUNG'],
            ['negara_id'=> 1,'namaProfinsi' => 'KEPULAUAN BANGKA BELITUNG'],
            ['negara_id'=> 1,'namaProfinsi' => 'KEPULAUAN RIAU'],
            ['negara_id'=> 1,'namaProfinsi' => 'DKI JAKARTA'],
            ['negara_id'=> 1,'namaProfinsi' => 'JAWA BARAT'],
            ['negara_id'=> 1,'namaProfinsi' => 'JAWA TENGAH'],
            ['negara_id'=> 1,'namaProfinsi' => 'DI YOGYAKARTA'],
            ['negara_id'=> 1,'namaProfinsi' => 'JAWA TIMUR'],
            ['negara_id'=> 1,'namaProfinsi' => 'BANTEN'],
            ['negara_id'=> 1,'namaProfinsi' => 'BALI'],
            ['negara_id'=> 1,'namaProfinsi' => 'NUSA TENGGARA BARAT'],
            ['negara_id'=> 1,'namaProfinsi' => 'NUSA TENGGARA TIMUR'],
            ['negara_id'=> 1,'namaProfinsi' => 'KALIMANTAN BARAT'],
            ['negara_id'=> 1,'namaProfinsi' => 'KALIMANTAN TENGAH'],
            ['negara_id'=> 1,'namaProfinsi' => 'KALIMANTAN SELATAN'],
            ['negara_id'=> 1,'namaProfinsi' => 'KALIMANTAN TIMUR'],
            ['negara_id'=> 1,'namaProfinsi' => 'KALIMANTAN UTARA'],
            ['negara_id'=> 1,'namaProfinsi' => 'SULAWESI UTARA'],
            ['negara_id'=> 1,'namaProfinsi' => 'SULAWESI TENGAH'],
            ['negara_id'=> 1,'namaProfinsi' => 'SULAWESI SELATAN'],
            ['negara_id'=> 1,'namaProfinsi' => 'SULAWESI TENGGARA'],
            ['negara_id'=> 1,'namaProfinsi' => 'GORONTALO'],
            ['negara_id'=> 1,'namaProfinsi' => 'SULAWESI BARAT'],
            ['negara_id'=> 1,'namaProfinsi' => 'MALUKU'],
            ['negara_id'=> 1,'namaProfinsi' => 'MALUKU UTARA'],
            ['negara_id'=> 1,'namaProfinsi' => 'PAPUA BARAT'],
            ['negara_id'=> 1,'namaProfinsi' => 'PAPUA'],
        ];


    public function run()
    {
        Profinsi::insert($this->profinsi);
    }

}
