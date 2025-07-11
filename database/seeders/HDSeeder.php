<?php

namespace Database\Seeders;

use App\Models\Harddisk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HDSeeder extends Seeder
{
   protected $hd=[
        'barang_id'=>1,
        'tipeHardDisk_id'=>2,
        'kapasitas'=>'512',
        'satuanSize_id'=>3,
        'keterangan'=>'bawaan pabrik',
   ];
    public function run(): void
    {
        Harddisk::insert($this->hd);
    }
}
