<?php

namespace Database\Seeders;

use App\Models\SatuanSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSizeSeeder extends Seeder
{
  protected $satuanSize =  [
        ['namaSatuanSize'=>'KB'],
        ['namaSatuanSize'=>'MB'],
        ['namaSatuanSize'=>'GB'],
        ['namaSatuanSize'=>'TB'],
    ];

    public function run(): void
    {
        SatuanSize::insert($this->satuanSize);

    }
}
