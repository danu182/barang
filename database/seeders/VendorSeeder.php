<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    protected $vendor=[
        [
            'namaVendor'=>'Artatel',
            'alamatVendor'=>'Jakarta Utara',
            'tlpVendor'=>'021-0232525',
            'keterangan'=>'ISP',
        ],
        [
            'namaVendor'=>'Spectra',
            'alamatVendor'=>'Jakarta Selatan',
            'tlpVendor'=>'021-5552562',
            'keterangan'=>'ISP',
        ],
        [
            'namaVendor'=>'Google',
            'alamatVendor'=>'Jakarta Selatan',
            'tlpVendor'=>'021-3264678',
            'keterangan'=>'cloud',
        ],
        [
            'namaVendor'=>'PAM',
            'alamatVendor'=>'Jakarta Pusat',
            'tlpVendor'=>'021-2325869',
            'keterangan'=>'Air Bersih',
        ],


    ];

    public function run(): void
    {
        Vendor::insert($this->vendor);
    }
}
