<?php

namespace App\Http\Controllers;

use App\Models\TipeMutasi;
use Illuminate\Http\Request;

class TipeMutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipeMutasi = TipeMutasi::all();
        return view('tipe-mutasi.index', compact('tipeMutasi'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="tambah tipe mutasi";
        return view('tipe-mutasi.create', compact('title') );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'namaMutasi' => 'required|string|max:255',
            'keteranganMutasi'=>'nullable',
        ]);

        $tipeMutasi = TipeMutasi::create($data);
        return redirect()->route('tipe-mutasi.index')->with('success', ' tipe-mutasi  ' . $request->namaMutasi . ' add successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipeMutasi $tipeMutasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipeMutasi $tipeMutasi)
    {
        $title="tambah tipe mutasi";
        return view('tipe-mutasi.edit', compact('title','tipeMutasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipeMutasi $tipeMutasi)
    {
        $data = $request->validate([
            'namaMutasi' => 'required|string|max:255',
            'keteranganMutasi'=>'nullable',
        ]);

        $tipeMutasi->update($data);

        return redirect()->route('tipe-mutasi.index')->with('success', ' tipe-mutasi  ' . $request->namaMutasi . ' updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipeMutasi $tipeMutasi)
    {
        try{
            $tipeMutasi->delete();

        }
        catch(\Exception $e){
            return redirect()->route('tipe-mutasi.index')->with('error', ' bagian ' . $tipeMutasi->namaMutasi . $e->getMessage());

        }
        return redirect()->route('tipe-mutasi.index')->with('success', ' bagian ' . $tipeMutasi->namaMutasi . ' berhasil di delete.');
    }
}
