<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bagian= Bagian::all();
        return view('bagian.index', compact('bagian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title= "tambah bagian";
        return view('bagian.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_bagian' => 'required|string|max:255',
            'keteranganBagian'=>'nullable',
        ]);

        $kota = Bagian::create($data);
        return redirect()->route('bagian.index')->with('success', ' bagian  ' . $request->nama_bagian . ' add successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bagian $bagian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bagian $bagian)
    {
        $title ="edit bagian";
        return view('bagian.edit',compact('bagian', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bagian $bagian)
    {
        $data = $request->validate([
            'nama_bagian' => 'required|string|max:255',
            'keteranganBagian'=>'nullable',
        ]);
        $bagian->update($data);
        return redirect()->route('bagian.index')->with('success', ' bagian  ' . $request->nama_bagian . ' updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bagian $bagian)
    {
       try{
            $bagian->delete();

        }
        catch(\Exception $e){
            return redirect()->route('bagian.index')->with('error', ' bagian ' . $bagian->nama_bagian . $e->getMessage());

        }
        return redirect()->route('bagian.index')->with('success', ' bagian ' . $bagian->nama_bagian . ' berhasil di delete.');
    }
}
