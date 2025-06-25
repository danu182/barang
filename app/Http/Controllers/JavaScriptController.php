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
                'picUser' => $pelanggan->picPelanggan ,
                'picAlamat' => $pelanggan->alamatPelanggan,
                'picTlp' => $pelanggan->tLpPelanggan,
                'picEmail' => $pelanggan->emailPelanggan,
            ]);
        }
        return response()->json([]);
    }





}
