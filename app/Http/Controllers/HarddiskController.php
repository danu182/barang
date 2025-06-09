<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Harddisk;
use App\Models\TipeHardDisk;
use Illuminate\Http\Request;

class HarddiskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Barang $barang)
    {
        $title="Hard Disk ";
        $harddisk= Harddisk::with('barang','tipeHardDisk')->where('barang_id', $barang->id)->get();

        return view('HDD.index', compact('barang', 'title', 'harddisk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Barang $barang, Harddisk $harddisk)
    {
        $title="tambah Hard Disk ";

        $tipeHardDisk= TipeHardDisk::all();

        return view('HDD.create', compact('barang','title','harddisk','tipeHardDisk'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Barang $barang)
    {
        $data=[
            "tipeHardDisk_id"=>$request->tipeHardDisk_id,
            "kapasitas"=>$request->kapasitas,
        ];

        $data['barang_id']=$barang->id;
        // return $data;
        $harddisk = Harddisk::create($data);

        return redirect()->route('barang.harddisk.index',$barang['id'])->with('success', ' sosmed detail ' . $request->kapasitas . ' added successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show($barang, $harddisk)
    {
        $title="Rincian Hard Disk";
        $harddisk= Harddisk::with('barang','tipeHardDisk')->where('id', $harddisk)->first();

        return view('HDD.show', compact('title','harddisk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Harddisk $harddisk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Harddisk $harddisk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($barang, $harddisk)
    {

        $barang= Barang::where('id', $barang)->first();
        //get product by ID
        $harddisk = Harddisk::findOrFail($harddisk);

        try{
            $harddisk->delete();

        }
        catch(\Exception $e){
            return redirect()->route('barang.harddisk.index',['barang'=>$harddisk['barang_id'], 'harddisk'=>$harddisk['id']])->with('error', ' harddisk ' . $harddisk->kapasitas . $e->getMessage());

        }
        return redirect()->route('barang.harddisk.index',['barang'=>$harddisk['barang_id'], 'harddisk'=>$harddisk['id']])->with('success', ' harddisk ' . $harddisk->kapasitas . ' berhasil di delete.');
    }
}
