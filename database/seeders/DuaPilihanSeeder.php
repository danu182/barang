<?php

namespace Database\Seeders;

use App\Models\DuaPilihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DuaPilihanSeeder extends Seeder
{

    protected $dua=[
        ['namaPilihan'=>'NON AKTIF'],
        ['namaPilihan'=>'AKTIF'],
    ];
    public function run(): void
    {
        DuaPilihan::insert($this->dua);
    }
}
