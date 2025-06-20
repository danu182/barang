<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Models\StatusTagihan;
use App\Models\TagihanDetail;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "tagihan ";
        $statusTagihan= StatusTagihan::all();
        $tagihan = Tagihan::all();
        return view('tagihan.index', compact('tagihan', 'title','statusTagihan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title="tambah tagihan";
        $vendor= Vendor::all();
        return view('tagihan.coba', compact('vendor','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'noTagihan' => 'required|string|max:255',
            'upTagihan' => 'required|nullable|string',
            'tanggalTagihan' => 'date',
            'dueDateTagihan' => 'date',
            'periodeTagihan' => 'nullable|string',
            // 'totaltagihan' => 'nullable|string',
            'lampiran' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'namaItem.*' => 'required|nullable|string',
            'jumlah.*' => 'required|nullable|string',
            'hargaSatuan.*' => 'required|nullable|string',
            'subtotal.*' => 'required|nullable|string',

            'picUser' => 'nullable|string',
            'picAlamat' => 'nullable|string',
            'picTlp' => 'nullable|string',
            'picEmail' => 'nullable|email',

        ]);

        $data['tanggalTagihan']= Helpers::formatDate($data['tanggalTagihan']);
        $data['dueDateTagihan']= Helpers::formatDate($data['dueDateTagihan']);

        $total = 0;
        foreach ($request->subtotal as $index => $subtotal) {
            // Convert subtotal to a float and add to total
            $total += (float) $subtotal;
        }

        // return $total;

        $Tagihanid = Tagihan::insertGetId([
                'vendor_id' => $data['vendor_id'],
                'noTagihan' => $data['noTagihan'],
                'upTagihan' => $data['upTagihan'],
                'tanggalTagihan' => $data['tanggalTagihan'],
                'dueDateTagihan' => $data['dueDateTagihan'],
                'periodeTagihan' => $data['periodeTagihan'],
                'totaltagihan' => $total,
                'lampiran' => $data['lampiran'],
                'keterangan' => $data['keterangan'] ?? null,

                'picUser' => $data['picUser'],
                'picAlamat' => $data['picAlamat'],
                'picTlp' => $data['picTlp'],
                'picEmail' => $data['picEmail'],

                'statusTagihan_id' => '1',

                'created_at' => now(),
            ]);

            // Loop melalui setiap tipe RAM yang dikirimkan
        foreach ($request->namaItem as $index => $namaItem) {
        // Simpan data ram ke database
            TagihanDetail::create([
                'tagihan_id' => $Tagihanid,
                'namaItem' => $data['namaItem'][$index],
                'jumlah' => $request['jumlah'][$index], // Ambil kapasitas dari input
                'hargaSatuan' => $data['hargaSatuan'][$index] ?? null, // Ambil keterangan dari input
                'subtotal' => $data['subtotal'][$index] ?? null, // Ambil keterangan dari input
                // 'created_at' => now(),
            ]);
        }

        // return redirect()->route('tagihan.index',['tagihan'=>$barang->id])->with('success', ' Ram detail ' . $barang->namaBarang . ' added successfully ');

        return redirect()->route('tagihan.index')->with('success', ' tagihan detail  added successfully ');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tagihan $tagihan)
    {

        // $tagihan= Tagihan::with('statusTagihan')->where('id', $tagihan->id)->first();


        return view('tagihan.show', compact('tagihan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tagihan $tagihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tagihan $tagihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tagihan $tagihan)
    {
        // try{

            TagihanDetail::where('tagihan_id', $tagihan->id)->delete();

            $tagihan->delete();

            return redirect()->route('tagihan.index');
        // }
        // catch(\Exception $e){
        //     return redirect()->route('tagihan.index')->with('error', ' tagihan '.'>> ' . $tagihan->vendor_id .' <<'.' tidak bisa di hapus - '. $e->getMessage());
        // }
        // return redirect()->route('tagihan.index')->with('success', ' tagihan ' . $tagihan->vendor_id . ' berhasil di delete.');
    }
}
