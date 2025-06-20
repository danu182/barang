<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Models\TagihanDetail;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "tagihan ";
        $tagihan = Tagihan::all();
        return view('tagihan.index', compact('tagihan', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title="tambah tagihan";
        $vendor= Vendor::all();
        return view('tagihan.coba', compact('vendor','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        $data = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'noTagihan' => 'required|string|max:255',
            'upTagihan' => 'required|nullable|string',
            'tanggalTagihan' => 'date',
            'dueDateTagihan' => 'date',
            'totaltagihan' => 'nullable|string',
            'lampiran' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'namaItem.*' => 'required|nullable|string',
            'jumlah.*' => 'required|nullable|string',
            'hargaSatuan.*' => 'required|nullable|string',
            'subtotal.*' => 'required|nullable|string',
        ]);

        $data['tanggalTagihan']= Helpers::formatDate($data['tanggalTagihan']);
        $data['dueDateTagihan']= Helpers::formatDate($data['dueDateTagihan']);


        $Tagihanid = Tagihan::insertGetId([
                'vendor_id' => $data['vendor_id'],
                'noTagihan' => $data['noTagihan'],
                'upTagihan' => $data['upTagihan'],
                'tanggalTagihan' => $data['tanggalTagihan'],
                'dueDateTagihan' => $data['dueDateTagihan'],
                'totaltagihan' => $data['totaltagihan'],
                'lampiran' => $data['lampiran'],
                'keterangan' => $data['keterangan'] ?? null,
                'created_at' => now(),
            ]);

            // Loop melalui setiap tipe RAM yang dikirimkan
        foreach ($request->namaItem as $index => $namaItem) {
        // Simpan data ram ke database
            TagihanDetail::create([
                'tagihan_id' => $Tagihanid,
                'namaItem' => $data['namaItem'][$index],
                'jumlah' => $request['jumlah'][$index], // Ambil kapasitas dari input
                'hargaSatuan' => $data['hargaSatuan'][$index] ?? null, // Ambil keterangan dari input
                'subtotal' => $data['subtotal'][$index] ?? null, // Ambil keterangan dari input
                // 'created_at' => now(),
            ]);
        }

        // return redirect()->route('barang.ram.index',['barang'=>$barang->id])->with('success', ' Ram detail ' . $barang->namaBarang . ' added successfully ');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tagihan $tagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tagihan $tagihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tagihan $tagihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tagihan $tagihan)
    {
        //
    }
}
