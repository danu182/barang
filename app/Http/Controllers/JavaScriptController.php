<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Vendor;
use Illuminate\Http\Request;

class JavaScriptController extends Controller
{

    public function fetchPelanggan($id)
    {
        $pelanggan = Pelanggan::find($id);

        if ($pelanggan) {
            return response()->json([
                'namaPelanggan' => $pelanggan->namaPelanggan ,
                'picUser' => $pelanggan->picPelanggan ,
                'picAlamat' => $pelanggan->alamatPelanggan,
                'picTlp' => $pelanggan->tLpPelanggan,
                'picEmail' => $pelanggan->emailPelanggan,
            ]);
        }
        return response()->json([]);
    }

    public function fetchVendor($id)
    {
        $vendor = Vendor::find($id);

        if ($vendor) {
            return response()->json([
                'namaVendor' => $vendor->namaVendor ,
                'alamatVendor' => $vendor->alamatVendor,
                'tlpVendor' => $vendor->tlpVendor,
                'emailVendor' => $vendor->emailVendor,
            ]);
        }
        return response()->json([]);
    }





}
