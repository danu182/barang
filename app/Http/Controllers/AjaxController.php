<?php

namespace App\Http\Controllers;

use App\Models\AssetMutation;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AjaxController extends Controller
// class AjaxController extends JsonResource
{

     public function getBarangDetails($barangId)
    {
        $barang = Barang::with(['prosesor.tipeProsesor', 'ram.tipeRam', 'hd.tipeHardDisk', 'kategori'])->find($barangId);
        // return $barang;

        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);
        }

        $assetMutasi= AssetMutation::with('barang','barang.ram','barang.ram.tipeRam','barang.hd','barang.hd.tipeHardDisk','user','lokasiOld','lokasiNew','mutationType','kondisi','bagian')->find($barangId);

        return response()->json([
            'barang' => $barang, // The formatted barang data
            'assetMutasi' => $assetMutasi // The asset mutation data (will be cast to JSON)
        ]);

        // Format data sesuai kebutuhan frontend
        // Anda bisa memilih data apa saja yang ingin dikirim
        // $formattedBarang = [
        //     'id' => $barang->id,
        //     'kodeBaranglama'=>$barang->kodeBaranglama,
        //     'kodeBarang'=>$barang->kodeBarang,
        //     'namaKategori' => $barang->kategori->namaKategori,
        //     'namaBarang' => $barang->namaBarang,
        //     'merek' => $barang->merek,
        //     'model' => $barang->model,

        //     // Menggabungkan data dari relasi ke format string jika diperlukan untuk label
        //     'prosesorDetails' => $barang->prosesor->map(function($proc) {
        //         return $proc->tipeProsesor->namaTipeProsesor . ' (' . $proc->kapasitas . ')';
        //     })->implode(', '),

        //     'tipeRam' => $barang->ram->map(function($ram) {
        //         return $ram->tipeRam->tipeRam . ' : ' . $ram->kapasitas;
        //     })->implode(', '),
        //     'harddiskDetails' => $barang->hd->map(function($hd) {
        //         return $hd->tipeHardDisk->namaTipeHardDisk . ' : ' . $hd->kapasitas;
        //     })->implode(', '),
        //     'nomorSeri' => $barang->nomorSeri,
        //     'tanggalPerolehan' => $barang->tanggalPerolehan,
        //     'catatan' => $barang->catatan,
        //     // Menggabungkan data dari relasi ke format string jika diperlukan untuk label

        //     // Tambahkan kolom lain yang ingin Anda tampilkan di form utama
        //     'nomorSeri' => $barang->nomorSeri,
        //     'tanggalPerolehan' => $barang->tanggalPerolehan,
        //     'hargaPerolehan' => $barang->hargaPerolehan,
        //     'vendor' => $barang->vendor,
        //     'catatan' => $barang->catatan,

        // ];


    }


    public function getBarangMutasi($barangId)
    {
        // $assetMutasi= AssetMutation::with('barang','barang.ram','barang.ram.tipeRam','barang.hd','user','lokasiOld','lokasiNew','mutationType','kondisi','bagian')->find(1);
        $assetMutasi= AssetMutation::find(1);

        if (!$assetMutasi) {
            return response()->json(['message' => 'Barang not found'], 404);
        }

        return response()->json($assetMutasi);

    }

}
