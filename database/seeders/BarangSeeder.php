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
            'pelanggan_id'=>1,
            'kodeBaranglama'=>'-null-',
            'kodeBarangAkuntansi'=>'AKUN123456',
            'kodeBarang'=>'PI/0725/0001',
            'kodeBarangUse'=>'PI/0725/0001/LP',
            'namaBarang'=> 'LENOVO TINKPAD',
            'merek' => 'Lenovo',
            'model' =>'T450',
            'nomorSeri'=> '1223-654-98782',
            'tanggalPerolehan'=>'2025-07-11',
            'hargaPerolehan'=> '7000000',
            'vendor'=>'TOKOPEDIA',
            'catatan'=>'BARANG TES',
            'merek' => 'Lenovo',
            'model' =>'V520',
            'nomorSeri'=> '1223-654-98782',
            'tanggalPerolehan'=>'2025-07-11',
            'hargaPerolehan'=> '7000000',
            'vendor'=>'TOKOPEDIA',
            'catatan'=>'BARANG TES',
            'created_at' => "2025-07-11 11:02:38",
            // 'created_at' =>  date("Y-m-d H:i:s"),
            // 'created_at' =>  date("Y-m-d H:i:s") ,

        ],
    ];


    public function run(): void
    {
        Barang::insert($this->barang);

    }
}
