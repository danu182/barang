<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use App\Models\Profinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ProfinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $title= "Negara";
        $profinsi = Profinsi::all();
        return view('lokasi.profinsi.index', compact('title','profinsi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="tambah profinsi";
        $negara = Negara::all();

        return view('lokasi.profinsi.create', compact('negara','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'negara_id' => 'exists:negaras,id',
            'namaProfinsi' => 'required|string|max:255',
            'keteranganProfinsi'=>'nullable',
        ]);

        $profinsi = Profinsi::create($data);
        return redirect()->route('profinsi.index')->with('success', ' Profinsi = ' . $request->namaProfinsi . ' added successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profinsi $profinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profinsi $profinsi)
    {

        $title='edit profinsi`';

        $id= $profinsi->id;



        $profinsi= Profinsi::with('negara')->where('id', $id)->first();
        $negara = Negara::all();
        return view('lokasi.profinsi.edit', compact('profinsi','title','negara'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profinsi $profinsi)
    {

        $data = $request->validate([
            'negara_id' => 'exists:negaras,id',
            'namaProfinsi' => 'required|string|max:255',
            'keteranganProfinsi'=>'nullable',
        ]);

        $profinsi->update($data);

        return redirect()->route('profinsi.index')->with('success', ' Profinsi = ' . $request->namaProfinsi . ' updated successfully ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profinsi $profinsi)
    {

        try{
            $profinsi->delete();

            return redirect()->route('profinsi.index')->with('success', ' profinsi ' . $profinsi->namaProfinsi . ' berhasil di delete.');
        }
        catch(\Exception $e){
            return redirect()->route('profinsi.index')->with('error', ' profinsi ' . $profinsi->namaProfinsi . $e->getMessage());

        }
    }
}
