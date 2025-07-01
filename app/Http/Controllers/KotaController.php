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

        // return $request->all();
        // $data = $request->validate([
        //     'profinsi_id' => 'exists:negaras,id',
        //     'namaKota' => 'required|string|max:255',
        //     'keteranganKota'=>'nullable',
        // ]);

        // return $request->all();
        $data = [
            'profinsi_id' => $request->profinsi_id,
            'namaKota' => $request->namaKota,
            'keteranganKota'=>$request->keteranganKota,
        ];

        $kota = Kota::create($data);
        return redirect()->route('kota.index')->with('success', ' Kota  ' . $request->namaKota . ' add successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kota $kota)
    {
        return $kota;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kota $kota, $id)
    {
        $kota = Kota::find($id); // Manually find the Kota by ID

        if (!$kota) {
            // If not found, redirect back to the index with an error message
            return redirect()->route('lokasi.kota.index')->with('error', 'Data kota tidak ditemukan.');
        }

        $title = "Edit Data Kota";
        $profinsi= Profinsi::all();

        return view('lokasi.kota.edit',compact('kota', 'title','profinsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kota $kota, $id)
    {
        // $data = $request->validate([
        //     'profinsi_id' => 'exists:profinsis,id',
        //     'namaKota' => 'required|string|max:255',
        //     'keteranganKota'=>'nullable',
        // ]);


        $data = [
            'profinsi_id' => $request->profinsi_id,
            'namaKota' => $request->namaKota,
            'keteranganKota'=>$request->keteranganKota,
        ];


        $kota = Kota::find($id);
        $kota->update($data);
        return redirect()->route('kota.index')->with('success', ' Kota = ' . $request->namaKota . ' added successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kota $kota, $id)
    {
        try{
            $kota=Kota::find($id);
            $kota->delete();

        }
        catch(\Exception $e){
            return redirect()->route('kota.index')->with('error', ' kota ' . $kota->namaKota . $e->getMessage());

        }
        return redirect()->route('kota.index')->with('success', ' kota ' . $kota->namaKota . ' berhasil di delete.');
    }
}
