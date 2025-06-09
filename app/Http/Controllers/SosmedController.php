<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title= 'Sosmed';
        $sosmed= Sosmed::all();
        return view('sosmed.index', compact('sosmed','title'));;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="tambah Sosmed";
        return view('sosmed.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'namaSosmed' => 'required|string|max:255',
            'keterangan'=> 'nullable',
        ]);
        // return $data;

        $sosmed = Sosmed::create($data);

        return redirect()->route('sosmed.index')->with('success', ' Sosmed ' . $request->namaSosmed . ' added successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sosmed $sosmed)
    {
        return $sosmed->sosmedDetail();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sosmed $sosmed)
    {
        $title="edit sosmed";
        return view('sosmed.edit', compact('sosmed','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sosmed $sosmed)
    {
        $data = $request->validate([
            'namaSosmed' => 'required|string|max:255',
            'keterangan'=> 'nullable',
        ]);

        $oldNamaSosmed = $sosmed['namaKategori'];

        $sosmed->update($data);

        return redirect()->route('sosmed.index')->with('success', ' sosmed = '. $oldNamaSosmed .'  berhsail di update menjadi = '. $request->namaSosmed);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sosmed $sosmed)
    {
        try{
            $sosmed->delete();
        }
        catch(\Exception $e){
            return redirect()->route('sosmed.index')->with('error', ' sosmed '.'>> ' . $sosmed->namaSosmed .' <<'.' tidak bisa di hapus - '. $e->getMessage());

        }
        return redirect()->route('sosmed.index')->with('success', ' sosmed ' . $sosmed->namaSosmed . ' berhasil di delete.');

    }
}
