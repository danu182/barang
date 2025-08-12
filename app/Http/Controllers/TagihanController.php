<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Http\Requests\StoreTagihanRequest;
use App\Models\Pelanggan;
use App\Models\StatusTagihan;
use App\Models\TagihanDetail;
use App\Models\VatPajak;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;
//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "tagihan ";

       if (request()->ajax()) {
            $tagihans = Tagihan::query()->with(['pelanggan', 'vendor']);
            return DataTables::of($tagihans)
                ->addIndexColumn()
                ->addColumn('created_at', function($row){
                    // Format the created_at timestamp using PHP's native date() function
                    return date('d-M-Y H:i:s', strtotime($row->created_at));
                })
                ->addColumn('action', function($row){
                    $btn1 = '<a href="tagihan/'.$row['id'].'" class="edit btn btn-success btn-rounded" style="color:white; font-size:small;">Lihat</a>';
                    // return $btn;
                    $btn2 = '<a href="' . route('tagihan.edit', $row['id']) . '" class="edit btn btn-warning btn-rounded" style="color:white; font-size:small;">edit</a>';

                      return $btn1 . ' ' . $btn2;
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('tagihan.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tagihan $tagihan)
    {

        $title="tambah tagihan";
        // $vendor= Vendor::all();
        // $pelanggan=Pelanggan::all();

        // return view('tagihan.lagi', compact('vendor','title','pelanggan'));
        // return view('tagihan.lagi');

        $pelanggan =Pelanggan::all();
        $vendor= Vendor::all();
        $vats = VatPajak::latest()->first();;

        // return $vats;

        // return view('tagihan.tagihan2', compact('tagihan','pelanggan','vendor','vats'));


        return view('tagihan.tagihan2', compact('title','vendor','pelanggan','vats'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request  $request)
    {

        // return $request->all();

        $data = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'pelanggan_id'=>'required|exists:pelanggans,id',
            'noTagihan' => 'required|string|max:255',
            'tanggalTagihan' => 'date',
            'periodeTagihan' => 'nullable|string',
            'dueDateTagihan' => 'nullable|date',

            'total' => 'required|numeric|min:0', // Crucial for final amount

            'grandTotal' => 'required|numeric|min:0', // Crucial for final amount

            'pajak' => 'nullable|numeric|min:0', // This is your hidden input value for VAT rate
            'denda' => 'nullable|numeric|min:0',

            'diskon' => 'nullable|numeric|min:0|max:100',

            'lampiran' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048', // Max 2MB

            //  'lampiran' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',

            'keterangan' => 'nullable|string',

            'namaItem.*' => 'nullable|string|max:255',
            'jumlah.*' => 'required|integer|min:0',
            'hargaSatuan.*' => 'required|numeric|min:0',
            'subtotal.*' => 'required|numeric|min:0',

        ]);

        //upload image
        $lampiran = $request->file('lampiran');
        $lampiran->storeAs('public/Tagihan', $lampiran->hashName());



        $data['tanggalTagihan']= Helpers::formatDate($data['tanggalTagihan']);
        $data['dueDateTagihan']= Helpers::formatDate($data['dueDateTagihan']);

        $data['vat']= ($data['pajak']/100)*$data['total'];

        // return $data;
        $Tagihanid = Tagihan::insertGetId([

            'vendor_id'=>$data['vendor_id'],
            'pelanggan_id'=>$data['pelanggan_id'],

            'noTagihan'=>$data['noTagihan'],
            'tanggalTagihan'=>$data['tanggalTagihan'],
            'dueDateTagihan'=>$data['dueDateTagihan'],
            'periodeTagihan'=>$data['periodeTagihan'],
            'nilaiTagihan'=>$data['total'],

            // 'totalTagihan'=>$data['totalTagihan'],
            'totaltagihan'=>$data['grandTotal'],

            'denda'=>$data['denda'],
            'diskon'=>$data['diskon'],
            'vat'=>$data['vat'],
            'keterangan'=>$data['keterangan'],
            'lampiran'=>$lampiran->hashName(),

            // 'statusTagihan_id'=>$data['statusTagihan_id'],

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
                'created_at' => now(),
            ]);
        }

        return redirect()->route('tagihan.index')->with('success', ' tagihan detail  added successfully ');

    }


    /**
     * Display the specified resource.
     */
    public function show(Tagihan $tagihan)
    {


        // return $tagihan;
        $tagihans = Tagihan::with(['pelanggan', 'vendor', 'detailTagihan'])->find($tagihan->id); // Sesuaikan dengan relasi Anda
        // return $tagihans    ;


        // Convert the detail_tagihan array to a Laravel collection
        $detailTagihanCollection = collect($tagihans->detailTagihan);

        // Sum the 'subtotal' values
        $totalSubtotal = $detailTagihanCollection->sum('subtotal');

    //    return $totalSubtotal;

        if (!$tagihan) {
            // Handle case where tagihan is not found, e.g., redirect or show 404
            abort(404);
        }

        // return $tagihans->detailTagihan;

        return view('inv.contoh', compact('tagihans','totalSubtotal'));

    }


    public function getTagihanDetails($id)
    {
        // Ambil data tagihan beserta relasi detail-nya
        // Contoh: Jika ada model TagihanDetail yang terkait dengan Tagihan
        $tagihan = Tagihan::with(['pelanggan', 'vendor', 'detailTagihan'])->find($id); // Sesuaikan dengan relasi Anda

        if (!$tagihan) {
            return response('Tagihan not found.', 404);
        }

        // Mengembalikan Blade view yang dirender sebagai string HTML
        return view('tagihan.detail_tagihan', compact('tagihan'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tagihan $tagihan)
    {
        $vendors = Vendor::all();
        $pelanggan = Pelanggan::all();
        $vats = VatPajak::latest()->first();;

        // Pass the existing tagihan data to the view
        return view('tagihan.edit', compact( 'vendors', 'pelanggan', 'vats'));
        // If you prefer a separate edit view: return view('tagihan.edit', compact('tagihan', 'vendors', 'pelanggan', 'vats'));
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

             Storage::delete('public/Tagihan/'. $tagihan->lampiran);

            $tagihan->delete();

            return redirect()->route('tagihan.index');
        // }
        // catch(\Exception $e){
        //     return redirect()->route('tagihan.index')->with('error', ' tagihan '.'>> ' . $tagihan->vendor_id .' <<'.' tidak bisa di hapus - '. $e->getMessage());
        // }
        // return redirect()->route('tagihan.index')->with('success', ' tagihan ' . $tagihan->vendor_id . ' berhasil di delete.');
    }


     public function fetchPelanggan($id)
    {
        $pelanggan = Pelanggan::find($id);
        if ($pelanggan) {
            return response()->json([
                'picUser ' => $pelanggan->picUser ,
                'picAlamat' => $pelanggan->picAlamat,
                'picTlp' => $pelanggan->picTlp,
                'picEmail' => $pelanggan->picEmail,
            ]);
        }
        return response()->json([]);
    }
}
