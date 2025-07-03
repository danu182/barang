<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

     public function getBarangDetails($id)
    {
        // Cari barang berdasarkan ID
        $barang = Barang::with(['prosesor.tipeProsesor', 'ram.tipeRam', 'hd.tipeHardDisk', 'kategori']) // Load relasi yang diperlukan
                        ->find($id);


        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);
        }

        // Format data sesuai kebutuhan frontend
        // Anda bisa memilih data apa saja yang ingin dikirim
        $formattedBarang = [
            'id' => $barang->id,
            'kodeBarang'=>$barang->kodeBaranglama,
            'kodeBarang'=>$barang->kodeBarang,
            'namaKategori' => $barang->kategori->namaKategori,
            'namaBarang' => $barang->namaBarang,
            'merek' => $barang->merek,
            'model' => $barang->model,
            'nomorSeri' => $barang->nomorSeri,
            'tanggalPerolehan' => $barang->tanggalPerolehan,
            'catatan' => $barang->catatan,
            // Menggabungkan data dari relasi ke format string jika diperlukan untuk label
            'tipeRam' => $barang->ram->map(function($ram) {
                return $ram->tipeRam->tipeRam . ' : ' . $ram->kapasitas;
            })->implode(', '),
            'prosesorDetails' => $barang->prosesor->map(function($proc) {
                return $proc->tipeProsesor->namaTipeProsesor . ' (' . $proc->kapasitas . ')';
            })->implode(', '),
            'harddiskDetails' => $barang->hd->map(function($hd) {
                return $hd->tipeHardDisk->namaTipeHardDisk . ' : ' . $hd->kapasitas;
            })->implode(', '),
            // Tambahkan kolom lain yang ingin Anda tampilkan di form utama
            'nomorSeri' => $barang->nomorSeri,
            'tanggalPerolehan' => $barang->tanggalPerolehan,
            'hargaPerolehan' => $barang->hargaPerolehan,
            'vendor' => $barang->vendor,
            'catatan' => $barang->catatan,

        ];

        return response()->json($formattedBarang);
    }


}
