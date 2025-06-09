<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use App\Models\SosmedDetail;
use Illuminate\Http\Request;

class SosmedDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Sosmed $sosmed)
    {
        $title="detail sosmed";

        $query = SosmedDetail::where('sosmed_id', $sosmed->id)->get();

        return view('sosmedDetail.index', compact('query', 'title','sosmed'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Sosmed $sosmed, SosmedDetail $sosmedDetail)
    {
        $title="tambah detail sosmed";
        return view('sosmedDetail.create', compact('title','sosmed','sosmedDetail'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Sosmed $sosmed)
    {
        $data=[
            "username"=>$request->username,
            "email"=>$request->email,
            "password"=>$request->password,
            "link"=>$request->link,
            "pemilik"=>$request->pemilik,
            "pic"=>$request->pic,
            "bagian"=>$request->bagian,
            "keterangan"=>$request->keterangan,
        ];

        $data['sosmed_id']=$sosmed->id;

        $sosmedDetail = SosmedDetail::create($data);

        return redirect()->route('sosmed.detail.index',$sosmed['id'])->with('success', ' sosmed detail ' . $request->username . ' added successfully ');


    }

    /**
     * Display the specified resource.
     */
    public function show(SosmedDetail $sosmedDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SosmedDetail $sosmedDetail, Sosmed $sosmed, $id)
    {

        $title="edit Detail sosmed";
        $sosmedDetail= SosmedDetail::where('id', $id)->first();

        return view('sosmedDetail.edit', compact('title', 'sosmed','sosmedDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SosmedDetail $sosmedDetail, Sosmed $sosmed, $id)
    {
        $validatedData = $request->validate([
            "username" => "required|string|max:255",
            "email" => "nullable|email|max:255",
            "password" => "nullable|string|min:3",
            "link" => "nullable|max:255",
            "pemilik" => "nullable|string|max:255",
            "pic" => "nullable|string|max:255",
            "bagian" => "nullable|string|max:255",
            "keterangan" => "nullable|string",
        ]);

        $data = [
            "username" => $validatedData['username'],
            "email" => $validatedData['email'],
            "password" => $validatedData['password'],
            "link" => $validatedData['link'],
            "pemilik" => $validatedData['pemilik'],
            "pic" => $validatedData['pic'],
            "bagian" => $validatedData['bagian'],
            "keterangan" => $validatedData['keterangan'],
        ];

        $data['sosmed_id']=$sosmed->id;

        $sosmedDetail = SosmedDetail::find($id);
        $sosmedDetail->update([
            "username" => $data['username'],
            "email" => $data['email'],
            "password" => $data['password'],
            "link" => $data['link'],
            "pemilik" => $data['pemilik'],
            "pic" => $data['pic'],
            "bagian" => $data['bagian'],
            "keterangan" => $data['keterangan'],
        ]);

        return redirect()->route('sosmed.detail.index', $sosmed['id'])->with('success', ' sosmed detail ' . $request->username . ' berhasil diupdate ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SosmedDetail $sosmedDetail, Sosmed $sosmed,  $detail )
    {
        $sosmedDetail = SosmedDetail::find($detail);
        try{
            $oldSosmedDetail = $sosmedDetail->sosmed->namaSosmed ;
            $sosmedDetail->delete();
            return redirect()->route('sosmed.detail.index', $sosmed['id'])->with('success', ' akun sosmed ' . $oldSosmedDetail . ' berhasil di delete.');
        }
        catch(\Exception $e){
            return redirect()->route('sosmed.detail.index', $sosmed['id'] )->with('error', ' akun sosmed ' .' >> '.$sosmedDetail->sosmed->namaSosmed.' '.'---> ' . $sosmedDetail->pemilik .' << ' .'  - tidak bisa di hapus - '. $e->getMessage());
        }
    }
}
