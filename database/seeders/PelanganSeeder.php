<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelanganSeeder extends Seeder
{
    protected $pelanggan =  [
        ['kodePelanggan'=>	'PI','namaPelanggan'=>'Hitawasana','picPelanggan'=>'pic','tLpPelanggan'=>'021-123456789','alamatPelanggan'=>'JAKARTA','emailPelanggan'=>'email@gmail.com','keteranganPelanggan'=>'keterangan'],
        ['kodePelanggan'=>	'MM','namaPelanggan'=>'Mahapala','picPelanggan'=>'pic','tLpPelanggan'=>'021-123456789','alamatPelanggan'=>'JAKARTA','emailPelanggan'=>'email@gmail.com','keteranganPelanggan'=>'keterangan'],
        ['kodePelanggan'=>	'DM','namaPelanggan'=>'Dama','picPelanggan'=>'pic','tLpPelanggan'=>'021-123456789','alamatPelanggan'=>'JAKARTA','emailPelanggan'=>'email@gmail.com','keteranganPelanggan'=>'keterangan'],
        ['kodePelanggan'=>	'GM','namaPelanggan'=>'Gita Mulia','picPelanggan'=>'pic','tLpPelanggan'=>'021-123456789','alamatPelanggan'=>'JAKARTA','emailPelanggan'=>'email@gmail.com','keteranganPelanggan'=>'keterangan'],
        ['kodePelanggan'=>	'TBS','namaPelanggan'=>'TBS','picPelanggan'=>'pic','tLpPelanggan'=>'021-123456789','alamatPelanggan'=>'JAKARTA','emailPelanggan'=>'email@gmail.com','keteranganPelanggan'=>'keterangan'],


    ];

    public function run(): void
    {
        Pelanggan::insert($this->pelanggan);
    }
}
