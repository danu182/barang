<?php

namespace Database\Seeders;

use App\Models\TipeProcesor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeProsesorSeeder extends Seeder
{


    protected $tipeProsesor=[
        ['namaTipeProsesor'=>'INTEL'],
        ['namaTipeProsesor'=>'AMD']
    ];

    public function run(): void
    {
        TipeProcesor::insert($this->tipeProsesor);
    }
}
