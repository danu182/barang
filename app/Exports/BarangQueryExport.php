<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangQueryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        // Lakukan join tabel di sini
        $data = Barang::Join('asset_mutations', 'barangs.id', '=', 'asset_mutations.barang_id')
                         ->select('barangs.kodeBarangUse', 'asset_mutations.kondisi_id') // Sesuaikan dengan kolom yang dibutuhkan
                         ->get();
        return $data;
    }
}
