<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelanganSeeder extends Seeder
{
    protected $pelanggan =  [
        [
            'kodePelanggan'=>'PI',
            'namaPelanggan'=>'Hitawasana',
            'picPelanggan'=>'Hitawasana',
            'tLpPelanggan'=>'021-123456789',
            'alamatPelanggan'=>'Jakarta',
            'emailPelanggan'=>'hitawasana$gmail.com',
            'keteranganPelanggan'=>'tesssss keterangan',
        ],
    ];

    public function run(): void
    {
        Pelanggan::insert($this->pelanggan);
    }
}
