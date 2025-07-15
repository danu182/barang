<?php

namespace Database\Seeders;

use App\Models\Bagian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BagianSeeder extends Seeder
{
    protected $bagian=[
        ['nama_bagian'	=>	'Art. Dir. Destin'	,'keteranganBagian'	=>	'keterangan Art. Dir. Destin'],
        ['nama_bagian'	=>	'Art. Dir. Prestige'	,'keteranganBagian'	=>	'keterangan Art. Dir. Prestige'],
        ['nama_bagian'	=>	'Distributor'	,'keteranganBagian'	=>	'keterangan Distributor'],
        ['nama_bagian'	=>	'Editor videographer'	,'keteranganBagian'	=>	'keterangan Editor videographer'],
        ['nama_bagian'	=>	'Editorial Fashion'	,'keteranganBagian'	=>	'keterangan Editorial Fashion'],
        ['nama_bagian'	=>	'IT & GA'	,'keteranganBagian'	=>	'keterangan IT & GA'],
        ['nama_bagian'	=>	'IT Svp'	,'keteranganBagian'	=>	'keterangan IT Svp'],
        ['nama_bagian'	=>	'Online Writer'	,'keteranganBagian'	=>	'keterangan Online Writer'],
        ['nama_bagian'	=>	'Online Writer DAI'	,'keteranganBagian'	=>	'keterangan Online Writer DAI'],
        ['nama_bagian'	=>	'Pajak'	,'keteranganBagian'	=>	'keterangan Pajak'],
        ['nama_bagian'	=>	'Photograper01'	,'keteranganBagian'	=>	'keterangan Photograper01'],
        ['nama_bagian'	=>	'Photograper02'	,'keteranganBagian'	=>	'keterangan Photograper02'],
        ['nama_bagian'	=>	'Resliana'	,'keteranganBagian'	=>	'keterangan Resliana'],
        ['nama_bagian'	=>	'Sales/Marketing'	,'keteranganBagian'	=>	'keterangan Sales/Marketing'],
        ['nama_bagian'	=>	'Web Dev 1'	,'keteranganBagian'	=>	'keterangan Web Dev 1'],
        ['nama_bagian'	=>	'Web Dev 2'	,'keteranganBagian'	=>	'keterangan Web Dev 2'],
        ['nama_bagian'	=>	'Web Dev 3'	,'keteranganBagian'	=>	'keterangan Web Dev 3'],

    ];

    public function run(): void
    {
        Bagian::insert($this->bagian);
    }


}
