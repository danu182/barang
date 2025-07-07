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
        // $barang = Barang::with(['prosesor.tipeProsesor', 'ram.tipeRam', 'hd.tipeHardDisk', 'kategori'])->find(1);

        // return $barang;

        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);
        }

        $assetMutasi= AssetMutation::with([
            'barang',
            'barang.ram',
            'barang.ram.tipeRam',
            'barang.hd',
            'barang.hd.tipeHardDisk',
            'user',
            'lokasiOld',
            'lokasiNew',
            'mutationType',
            'kondisi',
            'bagian'
            ])
            ->where('barang_id',$barangId)
             ->orderBy('mutation_date', 'desc') // Optional: order by date for history
            ->orderBy('created_at', 'desc')   // Optional: secondary order if dates are same
            ->get(); // <--- CRUCIAL FIX: Execute the query to get a collection
        // return $assetMutasi;
        return response()->json([
            'barang' => $barang, // The formatted barang data
            'assetMutasi' => $assetMutasi // The asset mutation data (will be cast to JSON)
        ]);


    }



}
