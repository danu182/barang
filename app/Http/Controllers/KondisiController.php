<?php

namespace App\Http\Controllers;

use App\Models\Kondisi;
use Illuminate\Http\Request;

class KondisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kondisi =Kondisi::all();
        $title="kondisi";

        return view('kondisi.index', compact('kondisi','title'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title ="tambah kondisi";
        return view('kondisi.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'namaKondisi' => 'required|string|max:255',
            'keteranganKondisi' => 'string|max:255',
        ]);

        $kategori = Kondisi::create($data);
        return redirect()->route('kondisi.index')->with('success', ' kondisi = ' . $request->namaKondisi . ' added successfully ');
    }


    /**
     * Display the specified resource.
     */
    public function show(Kondisi $kondisi)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kondisi $kondisi)
    {
        $title='edit Negara`';

        $negara= Kondisi::first();

        return view('lokasi.negara.edit', compact('negara','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kondisi $kondisi)
    {
        $data = $request->validate([
            'namaKondisi' => 'required|string|max:255',
            'keteranganKondisi' => 'string|max:255',
        ]);

        $kondisi->update($data);

        return redirect()->route('kondisi.index')->with('success', ' kondisi = ' . $request->namaKondisi . ' added successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kondisi $kondisi)
    {
        try{
            $kondisi->delete();

        }
        catch(\Exception $e){
            return redirect()->route('negara.index')->with('error', ' kondisi ' . $kondisi->namaKondisi . $e->getMessage());

        }
        return redirect()->route('negara.index')->with('success', ' kondisi ' . $kondisi->namaKondisi . ' berhasil di delete.');
    }
}
