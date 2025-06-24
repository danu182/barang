<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Pelanggan";
        $pelanggan =Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Tambah pelanggan";
        return view('pelanggan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'namaPelanggan' => 'string|required',
            'picPelanggan' => 'string|max:255',
            'tLpPelanggan' => 'string|max:255',
            'alamatPelanggan' => 'nullable|string',
            'emailPelanggan' => 'email|string',
            'keteranganPelanggan' => 'nullable',
        ]);


        Pelanggan::create($data);

        return redirect()->route('pelanggan.index')->with('success', ' Pelanggan ' . $data['namaPelanggan'] . ' added successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        $title="edit Pelanggan";

        return view('pelanggan.edit', compact('title','pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $data = $request->validate([
            'namaPelanggan' => 'string|required',
            'picPelanggan' => 'string|max:255',
            'tLpPelanggan' => 'string|max:255',
            'alamatPelanggan' => 'nullable|string',
            'emailPelanggan' => 'email|string',
            'keteranganPelanggan' => 'nullable',
        ]);
        $pelanggan->update($data);

        return redirect()->route('pelanggan.index')->with('success', ' Pelanggan = '. $pelanggan->namaPelanggan .'  berhsail di update menjadi = '. $request->namaPelanggan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        try{
            $pelanggan->delete();

        }
        catch(\Exception $e){
            return redirect()->route('pelanggan.index')->with('error', ' barang ' . $pelanggan->namaPelanggan . $e->getMessage());

        }
        return redirect()->route('pelanggan.index')->with('success', ' barang ' . $pelanggan->namaPelanggan . ' berhasil di delete.');
    }
}
