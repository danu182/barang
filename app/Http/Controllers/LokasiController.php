<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Lokasi;
use App\Models\Negara;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi=Lokasi::all();

        return view('lokasi.lokasi.index', compact('lokasi'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="tamabh lokasi";
        $kota=Kota::all();
        return view('lokasi.lokasi.create', compact('title', 'kota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'kota_id' => 'exists:KOTAS,id',
            'namaLokasi' => 'required|string|max:255',
            'lantai'=>'nullable',
            'keterangan'=>'nullable',
        ]);

        Lokasi::create($data);
        return redirect()->route('lokasi.index')->with('success', ' lokasi = ' . $request->namaLokasi . ' add successfully ');

    }

    /**
     * Display the specified resource.
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lokasi $lokasi)
    {
        $kota=Kota::all();
        $title ="edit lokasi";
        return view('lokasi.lokasi.edit', compact('lokasi','title', 'kota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $data = $request->validate([
            'kota_id' => 'exists:KOTAS,id',
            'namaLokasi' => 'required|string|max:255',
            'lantai'=>'nullable',
            'keterangan'=>'nullable',
        ]);

        $lokasi->update($data);
        return redirect()->route('lokasi.index')->with('success', ' lokasi = ' . $request->namaLokasi . ' updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        try{
            $lokasi->delete();

        }
        catch(\Exception $e){
            return redirect()->route('lokasi.index')->with('error', ' kategori ' . $lokasi->namaLokasi . $e->getMessage());

        }
        return redirect()->route('lokasi.index')->with('success', ' kategori ' . $lokasi->namaLokasi . ' berhasil di delete.');
    }
}
