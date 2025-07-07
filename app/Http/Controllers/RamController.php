<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ram;
use App\Models\SatuanSize;
use App\Models\TipeRam;
use Illuminate\Http\Request;

class RamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Barang $barang)
    {
        $title="Memory RAM ";
        $ram= Ram::with('barang','tipeRam','satuanSize')->where('barang_id', $barang->id)->get();

        return view('ram.index', compact('barang', 'title', 'ram'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Barang $barang, Ram $ram)
    {
        $title="tambah RAM ";

        $tipeRam= TipeRam::all();
        $satuanSize= SatuanSize::all();

        return view('ram.create', compact('barang','title','ram','tipeRam','satuanSize'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Barang $barang)
    {


        // return $request->all();

        // Validasi input
        $request->validate([
            'tipeRam_id.*' => 'required|exists:tipe_rams,id', // Validasi untuk tipe RAM
            'kapasitas.*' => 'required|string|max:255', // Validasi untuk kapasitas
            'keterangan.*' => 'nullable|string', // Validasi untuk keterangan
            'satuanSize_id.*' => 'nullable|string', // Validasi untuk keterangan
        ]);

        return $request->satuanSize_id;

        // Loop melalui setiap tipe RAM yang dikirimkan
        foreach ($request->tipeRam_id as $index => $tipeRamId) {
        // Simpan data ram ke database
            Ram::create([
                'barang_id' => $barang->id, // ID barang yang terkait
                'tipeRam_id' => $tipeRamId,
                'kapasitas' => $request->kapasitas[$index], // Ambil kapasitas dari input
                'satuanSize_id' => $request->satuanSize_id[$index], // Ambil kapasitas dari input
                'keterangan' => $request->keterangan[$index] ?? null, // Ambil keterangan dari input
            ]);
        }


        //  return $barang->id;

        return redirect()->route('barang.ram.index',['barang'=>$barang->id])->with('success', ' Ram detail ' . $barang->namaBarang . ' added successfully ');

    }

    /**
     * Display the specified resource.
     */
    public function show($barang, $ram)
    {
        $title="Rincian Hard Disk";
        $ram= Ram::with('barang','tipeRam')->where('id', $ram)->first();

        return view('ram.show', compact('title','ram'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ram $ram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ram $ram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($barang, $ram)
    {

        $barang= Barang::where('id', $barang)->first();
        //get product by ID
        $ram = Ram::findOrFail($ram);

        try{
            $ram->delete();

        }
        catch(\Exception $e){
            return redirect()->route('barang.ram.index',['barang'=>$ram['barang_id'], 'ram'=>$ram['id']])->with('error', ' ram ' . $ram->kapasitas . $e->getMessage());

        }
        return redirect()->route('barang.ram.index',['barang'=>$ram['barang_id'], 'ram'=>$ram['id']])->with('success', ' ram ' . $ram->kapasitas . ' berhasil di delete.');
    }
}
