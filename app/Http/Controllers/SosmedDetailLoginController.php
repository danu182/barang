<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use App\Models\SosmedDetail;
use App\Models\SosmedDetailLogin;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SosmedDetailLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($idSosmed, $detail)
    {
        $sosmed = Sosmed::where('id', $idSosmed)->first();
        $sosmedDetail = SosmedDetail::where('id',$detail)->first();

        $sosmedDetailLogin= SosmedDetailLogin::with('sosmedDetail','sosmedDetail.sosmed')->where('sosmedDetail_id', $detail)->get();
        $title="halaman list cxek login sosmed";

        return view('sosmedDetailLogin.index', compact('sosmedDetailLogin', 'title', 'sosmed','sosmedDetail'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($sosmed, $detail)
    {
        $title="asdasda";
        $sosmedDetail= SosmedDetail::where('id',$detail)->first();
        // return $sosmedDetail;
        $sosmed= Sosmed::where('id',$sosmed)->first();

        return view('sosmedDetailLogin.create', compact('sosmedDetail','sosmed','title'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $login)
    {

        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia

        $data= $request->validate([
            'sosmedDetail_id'=>'required|numeric',
            'status'=>'required|numeric',
            'keterangan'=>'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('gambar');
        $image->storeAs('images/SosmedDetailLogin', $image->hashName());

        SosmedDetailLogin::create([
            'sosmedDetail_id' => $request->sosmedDetail_id,
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i:s'),
            'keterangan'=> $data['keterangan'],
            'status' => $request->status,
            'gambar' => $image->hashName(),
        ]);

        $sosmedDetail= SosmedDetail::where('id',$data['sosmedDetail_id'])->first();
        // return $sosmedDetail;
        $sosmedDetailLogin = SosmedDetailLogin::where('id', $login)->first();

        // return redirect()->route('sosmed.detail.login.index',['sosmed' => $sosmed, 'detail' => $detail, 'login'=>$login ])->with(['success' => 'Data Berhasil Disimpan!']);

        // http://barang.test/sosmed/1/detail/1/login
        return redirect()->route('sosmed.detail.login.index',['sosmed' => $sosmedDetail['sosmed_id'], 'detail' => $sosmedDetail['id']])->with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(SosmedDetailLogin $sosmedDetailLogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SosmedDetailLogin $sosmedDetailLogin, $sosmed, $detail, $login)
    {
        $title="asdasd";
        $sosmed = Sosmed::where('id', $sosmed)->first();
        $sosmedDetail= SosmedDetail::where('id', $detail)->first();
        $sosmedDetailLogin = SosmedDetailLogin::where('id', $login)->first();

        return view('sosmedDetailLogin.edit', compact('title','sosmedDetailLogin', 'sosmed','sosmedDetail','detail','login'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SosmedDetailLogin $sosmedDetailLogin, $sosmed, $detail, $login)
    {
        $data= $request->validate([
            'sosmedDetail_id'=>'required|numeric',
            'status'=>'required|numeric',
            'keterangan'=>'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $sosmedDetailLogin= SosmedDetailLogin::where('id', $login)->first();
        $sosmedDetail= SosmedDetail::where('id', $detail)->first();

        //check if image is uploaded
        if ($request->hasFile('gambar')) {

			//delete old image
            Storage::delete('images/SosmedDetailLogin/'.$sosmedDetailLogin['gambar']);

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('images/SosmedDetailLogin', $image->hashName());

            //update product with new image
            $sosmedDetailLogin->update([
                'sosmedDetail_id' => $request->sosmedDetail_id,
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
                'keterangan'=> $data['keterangan'],
                'status' => $request->status,
                'gambar' => $image->hashName(),
            ]);

        } else {

            //update product without image
            $sosmedDetailLogin->update([
                'sosmedDetail_id' => $request->sosmedDetail_id,
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
                'keterangan'=> $data['keterangan'],
                'status' => $request->status,
            ]);
        }

        //redirect to index
        return redirect()->route('sosmed.detail.login.index',['sosmed' => $sosmedDetail['sosmed_id'], 'detail' => $sosmedDetail['id']])->with(['success' => 'Data Berhasil Di Update!']);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $sosmed, $detail, $login )
    {
        $sosmedDetail= SosmedDetail::where('id', $detail)->first();
        //get product by ID
        $sosmedDetailLogin = SosmedDetailLogin::findOrFail($login);

        //delete image
        Storage::delete('images/SosmedDetailLogin/'.$sosmedDetailLogin['gambar']);

        //delete product
        $sosmedDetailLogin->delete();

        return redirect()->route('sosmed.detail.login.index',['sosmed' => $sosmedDetail['sosmed_id'], 'detail' => $sosmedDetail['id']])->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
