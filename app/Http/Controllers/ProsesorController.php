<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Prosesor;
use App\Models\Ram;
use App\Models\TipeProcesor;
use Illuminate\Http\Request;

class ProsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Barang $barang)
    {
        $title="Memory RAM ";
        $prosesor= Prosesor::with('barang','tipeProsesor')->where('barang_id', $barang->id)->get();


        $collection = collect($prosesor);


        return view('prosesor.index', compact('barang', 'title', 'prosesor','collection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Barang $barang, Prosesor $prosesor)
    {
        $title="tambah Prosesor ";

        $tipeProsesor = TipeProcesor::all();

        return view('prosesor.create', compact('barang','title','prosesor','tipeProsesor'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Barang $barang)
    {
        $data=[
            "tipeProsesor_id"=>$request->tipeProsesor_id,
            "kapasitas"=>$request->kapasitas,
            "keterangan"=>$request->keterangan,
        ];

        $data['barang_id']=$barang->id;
        // return $data;
        $harddisk = Prosesor::create($data);

        return redirect()->route('barang.prosesor.index',$barang['id'])->with('success', ' Prosesor  ' . $request->kapasitas . ' added successfully ');    }

    /**
     * Display the specified resource.
     */
    public function show($barang, $prosesor)
    {
        $title="Rincian Prosesor";
        $prosesor= Prosesor::with('barang','tipeProsesor')->where('id', $prosesor)->first();

        return view('prosesor.show', compact('title','prosesor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prosesor $prosesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prosesor $prosesor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($barang, $prosesor)
    {

        $barang= Barang::where('id', $barang)->first();
        //get product by ID
        $prosesor = prosesor::findOrFail($prosesor);

        try{
            $prosesor->delete();

        }
        catch(\Exception $e){
            return redirect()->route('barang.prosesor.index',['barang'=>$prosesor['barang_id'], 'prosesor'=>$prosesor['id']])->with('error', ' prosesor ' . $prosesor->kapasitas . $e->getMessage());

        }
        return redirect()->route('barang.prosesor.index',['barang'=>$prosesor['barang_id'], 'prosesor'=>$prosesor['id']])->with('success', ' prosesor ' . $prosesor->kapasitas . ' berhasil di delete.');
    }
}
