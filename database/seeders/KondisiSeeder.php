<?php

namespace Database\Seeders;

use App\Models\Kondisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KondisiSeeder extends Seeder
{

    protected $kondisi=[
        ['namaKondisi'=>'Baik', 'keteranganKondisi'=>'Aset dalam kondisi baik dan berfungsi normal sesuai', ],
        ['namaKondisi'=>'Rusak Ringan', 'keteranganKondisi'=>'Aset mengalami kerusakan kecil yang tidak', ],
        ['namaKondisi'=>'Rusak Berat', 'keteranganKondisi'=>'Aset mengalami kerusakan parah dan tidak dapat', ],
        ['namaKondisi'=>'Hilang', 'keteranganKondisi'=>'Aset tidak dapat ditemukan atau tidak diketahui', ],
        ['namaKondisi'=>'Usang', 'keteranganKondisi'=>'Aset sudah tidak sesuai lagi dengan kebutuhan atau perkembangan teknologi. Meskipun masih berfungsi, nilai ekonominya mungkin sudah menurun.', ],
        ['namaKondisi'=>'Dalam Perbaikan', 'keteranganKondisi'=>'Aset sedang dalam proses perbaikan dan belum dapat digunakan.', ],
        ['namaKondisi'=>'Belum Siap', 'keteranganKondisi'=>'Aset belum siap digunakan karena berbagai alasan, misalnya belum dipasang, belum dikalibrasi, atau belum dioperasikan.', ],
        ['namaKondisi'=>'Tersedia', 'keteranganKondisi'=>'Aset siap untuk digunakan, tetapi belum dimanfaatkan.', ],
        ['namaKondisi'=>'Digunakan', 'keteranganKondisi'=>'Aset sedang digunakan dalam kegiatan operasional.', ],
        ['namaKondisi'=>'Disewakan', 'keteranganKondisi'=>'Aset disewakan kepada pihak lain.', ],
        ['namaKondisi'=>'Dipinjamkan', 'keteranganKondisi'=>'Aset dipinjamkan kepada pihak lain.', ],
        ['namaKondisi'=>'Dihapuskan', 'keteranganKondisi'=>'Aset secara resmi dihapuskan dari catatan aset.', ],

    ];

    public function run(): void
    {
        Kondisi::insert($this->kondisi);
    }
}
