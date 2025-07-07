<?php

namespace App\Http\Controllers;

use App\Models\AssetMutation;
use App\Models\Bagian;
use App\Models\Barang;
use App\Models\Kondisi;
use App\Models\Lokasi;
use App\Models\TipeMutasi;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class AssetMutationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $assetMutation = AssetMutation::orderBy('mutation_date', 'desc')->get();

        // return $assetMutation;

        return view('assetMutasi.index', compact('assetMutation'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $barang1 = Barang::with('ram', 'ram.tipeRam')->all();
        // return $barang1;

        $title="tmabah mutasi";

        $barang =Barang::with('kategori')->get();
        $lokasi= Lokasi::all();
        $kondisi =Kondisi::all();
        $tipeMutasi=TipeMutasi::all();

        $bagian =Bagian::all();
        $user =User::all();



        return view('assetMutasi.create', compact('title','barang','lokasi','bagian','user','kondisi','tipeMutasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=[
             "barang_id"=>$request->barang_id,
            // "old_location_id"=>$request->old_location_id,
            "new_location_id"=>$request->new_location_id,
            "mutation_date"=>$request->mutation_date,
            "mutation_type_id"=>$request->mutation_type_id,
            "kondisi_id"=>$request->kondisi_id,
            "bagian_id"=>$request->bagian_id,
            "notes"=>$request->notes,
            "user_id"=>$request->user_id,
        ];

        $latestItems =  AssetMutation::where('barang_id', $data['barang_id'])
                     ->latest()
                     ->first();

        if ($latestItems) { // Check if latestItems is not null
            if ($latestItems->old_location_id) {
                $data["old_location_id"] = $latestItems->new_location_id; // Use old_location_id
            } else {
                $data["old_location_id"] = 1; // Default value if old_location_id is null
            }
        } else {
            $data["old_location_id"] = 1; // Default value if no latestItems found
        }

        // return $data;

        AssetMutation::create($data);
        return redirect()->route('asset-mutasi.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(AssetMutation $assetMutation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetMutation $assetMutation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssetMutation $assetMutation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetMutation $assetMutation)
    {
        //
    }
}
