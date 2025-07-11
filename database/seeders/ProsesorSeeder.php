<?php

namespace Database\Seeders;

use App\Models\Prosesor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProsesorSeeder extends Seeder
{
    protected $pro=[
        [
            'barang_id'=> 1,
            'tipeProsesor_id'=>1,
            'kapasitas'=>'3.7 ghz',
            'keterangan'=> 'bawaan pabrik',
        ],
    ];
    public function run(): void
    {
        Prosesor::insert($this->pro);
    }
}
