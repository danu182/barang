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
            'emailVendor'=>'admin@Artatel.com',
            'keterangan'=>'ISP',
        ],
        [
            'namaVendor'=>'Spectra',
            'alamatVendor'=>'Jakarta Selatan',
            'tlpVendor'=>'021-5552562',
            'emailVendor'=>'admin@Spectra.com',
            'keterangan'=>'ISP',
        ],
        [
            'namaVendor'=>'Google',
            'alamatVendor'=>'Jakarta Selatan',
            'tlpVendor'=>'021-3264678',
            'emailVendor'=>'admin@Google.com',
            'keterangan'=>'cloud',
        ],
        [
            'namaVendor'=>'PAM',
            'alamatVendor'=>'Jakarta Pusat',
            'tlpVendor'=>'021-2325869',
            'emailVendor'=>'admin@PAM.com',
            'keterangan'=>'Air Bersih',
        ],


    ];

    public function run(): void
    {
        Vendor::insert($this->vendor);
    }
}
