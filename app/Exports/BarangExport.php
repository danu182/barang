<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class BarangExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::with('pelanggan','kategori','ram','ram.tipeRam')->get();
    }

    public function headings(): array
       {
           return [
                'id',
                'kategori_id',
                'pelanggan_id',
                'kodeBaranglama',
                'kodeBarangAkuntansi',
                'kodeBarang',
                'kodeBarangUse',
                'namaBarang',
                'merek',
                'model',
                'nomorSeri',
                'tanggalPerolehan',
                'hargaPerolehan',
                'vendor',
                'catatan',
                'created_at',
           ];
       }
}
