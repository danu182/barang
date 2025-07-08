<?php

namespace App\Http\Controllers;

use App\Models\AssetMutation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailMutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $assetMutasi = AssetMutation::all();

        // $latestMutations = AssetMutation::query()
        // ->groupBy('barang_id')
        // ->latestOfMany('mutation_date') // Mengambil record terbaru berdasarkan mutation_date untuk setiap barang_id
        // ->get();

        // $latestMutations = AssetMutation::query()
        //     ->groupBy('barang_id')
        //     ->latestOfMany(['mutation_date', 'created_at'])
        //     ->get();

        $title="asdasd";

        // $latestMutations = AssetMutation::
        // whereIn(
        //     'id', function ($query) {
        //         $query->selectRaw('MAX(id)') // Assuming 'id' is a good proxy for "latest"
        //             ->from('asset_mutations') // Replace 'mutasis' with your actual table name if different
        //             ->groupBy('barang_id');
        //     }
        // )
        // ->get();


        // return $latestMutations;

        return view('assetMutasiDetail.index',compact('title'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
