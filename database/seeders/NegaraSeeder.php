<?php

namespace Database\Seeders;

use App\Models\Negara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NegaraSeeder extends Seeder
{

     protected $negara =  ['namaNegara'=>'INDONESIA'];

    public function run(): void
    {
        Negara::insert($this->negara);
    }
}
