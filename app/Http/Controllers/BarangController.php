<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Models\DuaPilihan;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $tgl = date('Y-m-d');
        // return Helpers::formatDate($tgl);

        // $barang =Barang::with('kategori','hd', 'ram','prosesor')->get();
        // return $barang;

        // $barang =Barang::with('kategori')->get();

        $barang =Barang::with('ram','ram.tipeRam','hd', 'hd.tipeHardDisk')->get();
        // return $barang;

        // return $barang;



        $title="Barang";

        return view('barang.index', compact('barang', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title= "barang";
        $kategori= Kategori::all();

        return view('barang.create', compact('title','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ambil kode kategori berdasarkan $kategori_id
        $kategoriId= $request->kategori_id;
        $kategori=Kategori::findOrFail($kategoriId);
        $kategoriCode = strtoupper($kategori->kodeKategori);
        // return $kategoriCode;

        $tgl = date('Y-m-d');
        $datePrefix  = Helpers::formatDate($tgl);

        $tahun = date('Y');
        $bulan = date('m');
        $tanggal = date('d');
        // Build date string part
        $dateString = $tahun . $bulan . $tanggal;

        $prefix= $kategoriCode .'-'. $dateString . '-';
        // Find max nomor urut today for this kategori
        $lastKodeBarang = Barang::where('created_at', 'like', $datePrefix . '%')
            ->orderBy('created_at', 'desc')
            ->value('kodeBarang');
        $nomorUrut = 1; // default start sequence

        if ($lastKodeBarang) {
            // Extract the last 5 digits as sequence number
            $lastNumberStr = substr($lastKodeBarang, -5);
            if (is_numeric($lastNumberStr)) {
                $nomorUrut = intval($lastNumberStr) + 1;
            }
        }

         // format nomor urut with 5 digit zero padding
        $nomorUrutStr = str_pad($nomorUrut, 5, '0', STR_PAD_LEFT);
        $kodeBarang = $prefix . $nomorUrutStr;

        $data=[
            'kategori_id'=> $request->kategori_id,
            'kodeBaranglama'=> $request->kodeBaranglama,
            'kodeBarang'=> $kodeBarang,
            'namaBarang'=>$request->namaBarang,
            'merek'=> $request->merek,
            'model'=> $request->model,
            'nomorSeri'=> $request->nomorSeri,
            'tanggalPerolehan'=> $request->tanggalPerolehan,
            'hargaPerolehan'=> $request->hargaPerolehan,
            'vendor'=> $request->vendor,
            'catatan'=> $request->catatan,
        ];

         $kategori = Barang::create($data);
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $title = "sdasda";

        $kategori=Kategori::all();
        return view('barang.edit', compact('barang', 'title','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $data=[
            'kategori_id'=> $request->kategori_id,
            'kodeBaranglama'=> $request->kodeBaranglama,
            // 'kodeBarang'=> $kodeBarang,
            'namaBarang'=>$request->namaBarang,
            'merek'=> $request->merek,
            'model'=> $request->model,
            'nomorSeri'=> $request->nomorSeri,
            'tanggalPerolehan'=> $request->tanggalPerolehan,
            'hargaPerolehan'=> $request->hargaPerolehan,
            'vendor'=> $request->vendor,
            'catatan'=> $request->catatan,
        ];

         $barang->update($data);

        return redirect()->route('barang.index')->with('success', ' barang = '. $barang->namaBarang .'  berhsail di update menjadi = '. $request->namaBarang);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        try{
            $barang->delete();

        }
        catch(\Exception $e){
            return redirect()->route('barang.index')->with('error', ' barang ' . $barang->namaBarang . $e->getMessage());

        }
        return redirect()->route('barang.index')->with('success', ' barang ' . $barang->namaBarang . ' berhasil di delete.');
    }
}
