<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Vendor ";
        $vendor= Vendor::all();

        return view('vendor.index', compact( 'title', 'vendor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="tambah vendor ";

        // $tipeHardDisk= Vendor::all();

        return view('vendor.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'namaVendor' => 'string|required',
            'alamatVendor' => 'string|max:255',
            'tlpVendor' => 'string|max:255',
            'emailVendor' => 'nullable|email',
            'keterangan' => 'nullable|string',
        ]);


        Vendor::create($data);

        return redirect()->route('subcont.index')->with('success', ' Vendor ' . $data['namaVendor'] . ' added successfully ');

    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        return $vendor;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor, $id)
    {
        $title="edit Vendor";
        $vendor =Vendor::findOrFail($id);

        return view('vendor.edit', compact('title','vendor'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor, $id)
    {
        $data = $request->validate([
            'namaVendor' => 'string|required',
            'alamatVendor' => 'string|max:255',
            'tlpVendor' => 'string|max:255',
            'emailVendor' => 'nullable|email',
            'keterangan' => 'nullable|string',
        ]);


        // $vendor->update();

        $vendor= Vendor::findOrFail($id);
        $vendor->namaVendor = $data['namaVendor'];
        $vendor->alamatVendor = $data['alamatVendor'];
        $vendor->tlpVendor = $data['tlpVendor'];
        $vendor->emailVendor = $data['emailVendor'];
        $vendor->keterangan = $data['keterangan'];
        $vendor->save();

        return redirect()->route('subcont.index')->with('success', ' Vendor ' . $data['namaVendor'] . ' updated successfully ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor, $id)
    {
        $vendor= Vendor::findOrFail($id);
        $vendor->delete();

        return redirect()->route('subcont.index')->with('success', ' Vendor ' . $vendor['namaVendor'] . ' deleted successfully ');
    }
}
