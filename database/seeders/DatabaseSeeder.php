<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use App\Models\TipeHardDisk;
use App\Models\TipeMutasi;
use App\Models\TipeRam;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            $this->call(NegaraSeeder::class);
            $this->call(ProfinsiSeeder::class);
            $this->call(KotaSeeder::class);
            $this->call(LokasiSeeder::class);
            $this->call(DuaPilihanSeeder::class);
            $this->call(KategoriSeeder::class);
            $this->call(BagianSeeder::class);
            $this->call(KondisiSeeder::class);
            $this->call(TipeMutasiSeeder::class);
            $this->call(TipeRamSeeder::class);
            $this->call(TipeHardiskSeeder::class);
            $this->call(TipeProsesorSeeder::class);
            $this->call(UserSeeder::class);

    }
}
