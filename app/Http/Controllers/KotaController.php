<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Profinsi;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="";
        $kota =Kota::all();


        return view('lokasi.kota.index', compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title ="tambah kota";
        $profinsi =Profinsi::All();
        return view('lokasi.kota.create', compact('profinsi','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'profinsi_id' => 'exists:negaras,id',
            'namaKota' => 'required|string|max:255',
            'keteranganKota'=>'nullable',
        ]);
        $kota = Kota::create($data);
        return redirect()->route('kota.index')->with('success', ' Kota  ' . $request->namaKota . ' add successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kota $kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kota $kota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kota $kota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kota $kota)
    {
        //
    }
}
