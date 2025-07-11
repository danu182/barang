<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use Illuminate\Http\Request;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title= "Negara";
        $negara = Negara::all();
        return view('lokasi.negara.index', compact('title','negara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title="tambah negara";
        return view('lokasi.negara.create', compact('title'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'namaNegara' => 'required|string|max:255',
            'keteranganNegara' => 'nullable',
        ]);

        $kategori = Negara::create($data);
        return redirect()->route('negara.index')->with('success', ' negara = ' . $request->namaNegara . ' added successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Negara $negara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Negara $negara)
    {
        $title='edit Negara`';

        $negara= Negara::first();

        return view('lokasi.negara.edit', compact('negara','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Negara $negara)
    {

        $data = $request->validate([
            'namaNegara' => 'required|string|max:255',
            'keteranganNegara' => 'nullable',
        ]);



        $negara->update($data);
        return redirect()->route('negara.index')->with('success', ' negara = ' . $request->namaNegara . ' updated successfully ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Negara $negara)
    {
        try{
            $negara->delete();
            return redirect()->route('negara.index')->with('success', ' negara ' . $negara->namaNegara . ' berhasil di delete.');
        }
        catch(\Exception $e){
            return redirect()->route('negara.index')->with('error', ' negara  ' . $negara->namaNegara . $e->getMessage());

        }

    }
}
