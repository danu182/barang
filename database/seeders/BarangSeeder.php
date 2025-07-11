<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{

    protected $barang=[
        [
            'kategori_id'=>1,
            'kodeBaranglama'=>'-',
            'kodeBarang'=>'AIO-20250711-00001',
            'namaBarang'=> 'PC ALL IN ONE LENOVO V520',
            'merek' => 'Lenovo',
            'model' =>'V520',
            'nomorSeri'=> '1223-654-98782',
            'tanggalPerolehan'=>'2025-07-11',
            'hargaPerolehan'=> '7000000',
            'vendor'=>'TOKOPEDIA',
            'catatan'=>'BARANG TES',
        ],
    ];


    public function run(): void
    {
        Barang::insert($this->barang);

    }
}
