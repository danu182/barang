<?php

namespace Database\Seeders;

use App\Models\Bagian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BagianSeeder extends Seeder
{
    protected $bagian=[
        ['nama_bagian'=>'Keuangan','keteranganBagian'=>'keterangan bagian'],
        ['nama_bagian'=>'SDM','keteranganBagian'=>'keterangan bagian'],
        ['nama_bagian'=>'ADMINISTRASI','keteranganBagian'=>'keterangan bagian'],
        ['nama_bagian'=>'MARKETING','keteranganBagian'=>'keterangan bagian'],
        ['nama_bagian'=>'OPERATOR','keteranganBagian'=>'keterangan bagian'],
        ['nama_bagian'=>'GUDANG','keteranganBagian'=>'keterangan bagian'],
    ];

    public function run(): void
    {
        Bagian::insert($this->bagian);
    }


}
