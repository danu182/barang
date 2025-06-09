<?php

namespace App\Http\Controllers;

use App\Models\DuaPilihan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Kategori";
        $kategori= Kategori::all();
        // return $barang->kategori->namaKategori;
        return view('kategori.index',compact('kategori', 'title')   );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title= "Add kategori";
        $duaPilihan = DuaPilihan::all();

        return view('kategori.create', compact('title','duaPilihan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'kodeKategori' => 'required|string|max:255',
            'namaKategori' => 'required|string|max:255', // Pastikan location_id valid
            'duaPilihan_id' => 'required', // Pastikan location_id valid
        ]);

        $kategori = Kategori::create($data);


        return redirect()->route('kategori.index')->with('success', ' Kategori ' . $request->namaKategori . ' added successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        $title='edit Kategori';


        $kategori= Kategori::with('duaPilihan')->first();


        // return $kategori;

        $duaPilihan= DuaPilihan::all();
        return view('kategori.edit', compact('kategori','title','duaPilihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $data = $request->validate([
            'kodeKategori' => 'required|string|max:255',
            'namaKategori' => 'required|string|max:255',
            'duaPilihan_id' => 'required',
        ]);

        $oldKategori = $kategori['namaKategori'];

        $kategori->update($data);

        return redirect()->route('kategori.index')->with('success', ' kategori = '. $oldKategori .'  berhsail di update menjadi = '. $request->namaKategori);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        try{
            $kategori->delete();

        }
        catch(\Exception $e){
            return redirect()->route('kategori.index')->with('error', ' kategori ' . $kategori->namaKategori . $e->getMessage());

        }
        return redirect()->route('kategori.index')->with('success', ' kategori ' . $kategori->namaKategori . ' berhasil di delete.');
    }
}
