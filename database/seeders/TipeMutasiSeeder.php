<?php

namespace Database\Seeders;

use App\Models\TipeMutasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeMutasiSeeder extends Seeder
{

    protected $tipeMutasi=[
        ['namaMutasi'=> 'Mutasi antar ruangan', 'keteranganMutasi'=>'Perpindahan aset dari satu ruangan ke ruangan lain dalam satu gedung.'],
        ['namaMutasi'=> 'Mutasi antar gedung', 'Perpindahan aset dari satu gedung ke gedung lain, baik dalam satu area maupun antar area.'],
        ['namaMutasi'=> 'Mutasi antar unit kerja', 'Perpindahan aset antar unit kerja atau departemen dalam suatu organisasi.'],
        ['namaMutasi'=> 'Mutasi antar wilayah', 'Perpindahan aset antar wilayah atau lokasi yang berbeda.'],
        ['namaMutasi'=> 'Mutasi antar pemakai', 'Perpindahan aset dari satu pengguna ke pengguna lain, misalnya dari karyawan satu ke karyawan lain.'],
        ['namaMutasi'=> 'Mutasi ke unit lain', 'Perpindahan aset dari satu unit kerja ke unit kerja lain dalam organisasi.'],
        ['namaMutasi'=> 'Mutasi ke gudang', 'Perpindahan aset ke gudang, baik karena rusak, tidak terpakai, atau untuk penyimpanan sementara.'],
        ['namaMutasi'=> 'Mutasi aset tetap', 'Perpindahan aset tetap seperti peralatan, mesin, bangunan, dan tanah.'],
        ['namaMutasi'=> 'Mutasi aset bergerak', 'Perpindahan aset yang dapat dipindahkan, seperti kendaraan, peralatan, atau inventaris.'],
        ['namaMutasi'=> 'Mutasi aset tak bergerak', 'Perpindahan aset yang tidak dapat dipindahkan, seperti tanah dan bangunan.'],
        ['namaMutasi'=> 'Mutasi aset lancar', 'Perpindahan aset yang bersifat sementara atau memiliki masa manfaat kurang dari satu tahun, seperti kas, piutang, dan persediaan.'],
        ['namaMutasi'=> 'Mutasi karena perbaikan', 'Aset dipindahkan untuk diperbaiki dan kemudian dikembalikan ke lokasi awal.'],
        ['namaMutasi'=> 'Mutasi karena pemeliharaan', 'Aset dipindahkan untuk pemeliharaan berkala.'],
        ['namaMutasi'=> 'Mutasi karena penghapusan', 'Aset dipindahkan karena sudah tidak layak pakai dan akan dihapus dari pembukuan.'],
        ['namaMutasi'=> 'Mutasi karena penghapusan', 'Aset dipindahkan karena sudah tidak layak pakai dan akan dihapus dari pembukuan.'],
        ['namaMutasi'=> 'Mutasi karena pemindahan lokasi', 'Aset dipindahkan karena perubahan lokasi kerja atau kebutuhan operasional.'],
        ['namaMutasi'=> 'Mutasi karena hibah/pinjaman', 'Aset dipindahkan karena diberikan sebagai hibah atau dipinjamkan kepada pihak lain.'],
    ];


    public function run(): void
    {
        TipeMutasi::insert($this->tipeMutasi);
    }
}
