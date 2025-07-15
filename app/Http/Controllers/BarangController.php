<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Models\DuaPilihan;
use App\Models\Pelanggan;

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

        $barang =Barang::with('ram','ram.tipeRam','hd', 'hd.tipeHardDisk')->orderBy('created_at', 'desc')->get();

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
        $pelanggan= Pelanggan::all();

        return view('barang.create', compact('title','kategori','pelanggan'));
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

        // ambil kode perusahaan berdasarkan $pelanggan_id
        $pelangganId= $request->pelanggan_id;
        $pelanggan=Pelanggan::findOrFail($pelangganId);
        $pelangganCode = strtoupper($pelanggan->kodePelanggan);

        $tgl = date('Y-m-d');
        $datePrefix  = Helpers::formatDate($tgl);

        $tahun = date('y');
        $bulan = date('m');
        $tanggal = date('d');
        // Build date string part
        // $dateString = $tahun . $bulan . $tanggal;
        $dateString =  $tahun. $bulan  ;

        $prefix= $pelangganCode .'/'. $bulan. $tahun  . '/';
        // Find max nomor urut today for this kategori
        // $lastKodeBarang = Barang::where('created_at', 'like', $datePrefix . '%')
        //     // ->where('pelanggan_id', $pelanggan->id)
        //     ->orderBy('created_at', 'desc')
        //     ->value('kodeBarang');

        $lastBarang = Barang::where('pelanggan_id', $pelanggan->id)
                    ->latest('id')
                    ->first(); // Get the entire model or null

            // return $lastKodeBarang;
        $nomorUrut = 1; // default start sequence

        $lastKodeBarang = null; // Initialize to null

// Check if a record was found before trying to access its property
        if ($lastBarang) {
            $lastKodeBarang = $lastBarang->kodeBarang; // Access the kodeBarang property
        }

        $nomorUrut = 1; // Default start sequence

        if ($lastKodeBarang) {
            // Extract the last 4 digits as sequence number (based on your substr -4)
            $lastNumberStr = substr($lastKodeBarang, -4);
            if (is_numeric($lastNumberStr)) {
                $nomorUrut = intval($lastNumberStr) + 1;
            }
        }

        // Format nomor urut with 4 digit zero padding (to match -4 extraction)
        $nomorUrutStr = str_pad($nomorUrut, 4, '0', STR_PAD_LEFT);
        $kodeBarang = $prefix . $nomorUrutStr;
        $kodeBarangUse = $kodeBarang . '/' . $kategoriCode;

        // return $kodeBarangUse;

        $data=[
            'kategori_id'=> $request->kategori_id,
            'pelanggan_id'=> $request->pelanggan_id,
            'kodeBaranglama'=> $request->kodeBaranglama,
            'kodeBarangAkuntansi'=> $request->kodeBarangAkuntansi,
            'kodeBarang'=> $kodeBarang,
            'kodeBarangUse'=> $kodeBarangUse,
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
        $title = $barang->kodeBarangUse.' - nama barang = '.$barang->namaBarang .' - tanggal perolahan = '.$barang->tanggalPerolehan;

        $kategori=Kategori::all();
        $pelanggan=Pelanggan::all();
        return view('barang.edit', compact('barang', 'title','kategori','pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $data=[
            // 'kategori_id'=> $request->kategori_id,
            // 'pelanggan_id'=> $request->pelanggan_id,
            'kodeBaranglama'=> $request->kodeBaranglama,
            'kodeBarangAkuntansi'=> $request->kodeBarangAkuntansi,
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
